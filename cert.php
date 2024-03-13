<?php
// Random image name generation
$imageName = uniqid() . '.png';

// Create a new image with specified dimensions
$image = imagecreatetruecolor(400, 200);

// Allocate colors and define font
$backgroundColor = imagecolorallocate($image, 255, 255, 255); // white
$textColor = imagecolorallocate($image, 0, 0, 0); // black
$font = 'assets/font/font.ttf'; // Change this to your font file's path

// Fill the image background
imagefilledrectangle($image, 0, 0, 399, 199, $backgroundColor);

// Text to be written on the image
$text = 'John Doe'; // Change this to the desired text

// Calculate the position to center the text
$textbox = imagettfbbox(12, 0, $font, $text);
$x = (400 - $textbox[4]) / 2;
$y = (200 - $textbox[5]) / 2;

// Write the text on the image
imagettftext($image, 12, 0, $x, $y, $textColor, $font, $text);

// Set the appropriate header to output the image
header('Content-Type: image/png');

// Output the image directly to the browser
imagepng($image);

// Free up memory
imagedestroy($image);
?>
