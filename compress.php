<?php
// Increase maximum execution time to 10 minutes (600 seconds)
set_time_limit(600);

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Specify the image folder to compress
$imageFolder = '/upload';

// Function to compress images
function compressImage($source) {
    // Check if the image size is less than 100 KB
    if (filesize($source) < 100000) {
        // If the image size is already below 100 KB, no compression is needed
        return true;
    }

    if (!function_exists('imagecreatefromjpeg') || !function_exists('imagecreatefrompng') || !function_exists('imagecreatefromgif') || !function_exists('imagecreatefromwebp')) {
        echo "Error: Required image processing functions do not exist.";
        return false;
    }

    $info = getimagesize($source);
    
    $mime = $info['mime'];
    switch ($mime) {
        case 'image/jpeg':
        case 'image/jpg': // Handle 'jpg' same as 'jpeg'
            $image = imagecreatefromjpeg($source);
            break;
            
        case 'image/png':
            $image = imagecreatefrompng($source);
            break;
        
        case 'image/webp':
            $image = imagecreatefromwebp($source);
            break;
            
        case 'image/gif':
            $image = imagecreatefromgif($source);
            break;
        
        default:
            echo "Unsupported image type: $mime (File: $source)";
            return false;
    }
    
    if(!$image) {
        echo "Error: Unable to create image from $source";
        return false;
    }
    
    // Determine the quality dynamically based on image dimensions
    $width = imagesx($image);
    $height = imagesy($image);
    $compressionFactor = 0.8; // Initial compression factor

    // Adjust compression factor based on image size
    if ($width > 1200 || $height > 1200) {
        $compressionFactor = 0.7;
    } elseif ($width > 800 || $height > 800) {
        $compressionFactor = 0.75;
    } elseif ($width > 400 || $height > 400) {
        $compressionFactor = 0.8;
    }

    // Compress the image
    if(!imagejpeg($image, $source, $compressionFactor * 100)) {
        echo "Error: Failed to compress image $source";
        return false;
    }
    
    return true;
}

// Compress all images in the folder
$files = glob($imageFolder . '*.{gif,jpg,jpeg,png,webp}', GLOB_BRACE);
$totalFiles = count($files);
$processedFiles = 0;
foreach($files as $file) {
    if(compressImage($file)) {
        $processedFiles++;
    } else {
        echo "<br>";
        echo "Failed to compress image: $file<br>";
    }
}

echo '<br>All images have been processed.<br>';
echo "Total images compressed: $processedFiles";
?>
