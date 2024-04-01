# image-compress-in-PHP-code
You can change your upload path

// Specify the image folder to compress
```
$imageFolder = '/upload';
```
// Check if the image size is less than 100 KB (It's a limit - you can change or remove this)
```
function compressImage($source) {
    // Check if the image size is less than 100 KB
    if (filesize($source) < 100000) {
        // If the image size is already below 100 KB, no compression is needed
        return true;
    }
```
// You can change compression factor
```
if ($width > 1200 || $height > 1200) {
        $compressionFactor = 0.7;
    } elseif ($width > 800 || $height > 800) {
        $compressionFactor = 0.75;
    } elseif ($width > 400 || $height > 400) {
        $compressionFactor = 0.8;
    }
```
##
Defines a function compressImage() to compress images if they exceed 100 KB.<br>
Determines compression quality based on image dimensions.<br>
Compresses images in a specified folder.<br>
Outputs the total number of images compressed.

Cron job run on [Cron-job](https://console.cron-job.org)
 Website 
``` https://domain.com/compress.php ```

Or,
#To run a cron job on cPanel, follow these steps:

1. **Login to cPanel**: Access your cPanel account using your credentials.

2. **Locate the Cron Jobs tool**: Depending on your cPanel theme, the Cron Jobs tool might be located under the "Advanced" or "Advanced" section. Look for the "Cron Jobs" or "Cron Scheduler" icon.

3. **Set up a new cron job**:
   - Click on the "Cron Jobs" or "Cron Scheduler" icon.
   - In the "Add New Cron Job" section, you'll see options to specify the timing for the cron job.

4. **Specify the command**: In the "Command to run" field, enter the command to execute your PHP script. For example:

   ```
   /usr/bin/php /home/username/public_html/path/to/your/script.php
   ```

   Replace `/home/username/public_html/path/to/your/script.php` with the actual path to your PHP script.

5. **Set the timing**: Choose the frequency and timing for your cron job. You can use the common formats like every minute, hourly, daily, etc., or specify a custom schedule using the fields provided.

6. **Save the cron job**: Click on the "Add New Cron Job" or "Add Cron Job" button to save your cron job.

7. **Verify**: After adding the cron job, you should see it listed in the Cron Jobs interface. You can also verify its presence by checking the crontab file directly.

That's it! Your cron job is now set up to run your PHP script at the specified intervals on cPanel. Make sure to test the cron job to ensure that it executes your script correctly.

# You can find me on [OwnTweet](https://owntweet.com/mkjuel)
