<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set the appropriate content type header
header("Content-type: image/jpeg");

// Path to the image
$img_path = "https://certificate.shailkumaricommercialinstitute.co.in/certificate_of_participation.jpg";

// Width and height of the image
$img_width = 2000;
$img_height = 1414;

// Path to the font files
$font_path = "https://certificate.shailkumaricommercialinstitute.co.in/assets/font/font.ttf";
$font_path2 = "https://certificate.shailkumaricommercialinstitute.co.in/assets/font/font2.ttf";

// Create a new image from the JPEG file
$jpg_img = imagecreatefromjpeg($img_path);

if (!$jpg_img) {
    // If image creation fails, output an error message
    die("Error: Failed to create image from JPEG file.");
}

if(isset($_GET['cid'])){
    require "admin/include/db.php";
    $query = $db->prepare('SELECT * from details where id=?');
    $query->execute(array($_GET['cid']));
    $data = $query->fetch();

    if (!$data) {
        // If query execution fails, output an error message
        die("Error: Failed to fetch data from database.");
    }

    $name = strtoupper($data['name']);
    if ($data['type']=="Participation") {
        $id=$data['id'];
    }
    $issuedOn_date=date_create($data['issuedOn']);
    $issuedOn="Date: ".date_format($issuedOn_date,"d-m-Y");
    $event_date_unformatted=date_create($data['event_date']);
    $event_date="on ".date_format($event_date_unformatted,"F, d Y");
    $issuedFor=$data['issuedFor'];
    $campus_name="of ".$data['campus_name'];
    list($left,, $right) = imageftbbox( 75, 0, $font_path, $name);
    $txt_width = $right - $left;
    $main_heading_pos = ($img_width/2)-($txt_width/2);
    
    list($left1,, $right1) = imageftbbox( 23, 0, $font_path2, $issuedFor);
    $txt_width2 = $right1 - $left1;
    $issuedFor_pos = ($img_width/2)-($txt_width2/2);

    list($left2,, $right2) = imageftbbox( 23, 0, $font_path2, $event_date);
    $txt_width3 = $right2 - $left2;
    $event_date_pos = ($img_width/2)-($txt_width3/2);

    list($left3,, $right3) = imageftbbox( 23, 0, $font_path2, $issuedOn);
    $txt_width4 = $right3 - $left3;
    $issued_on_pos = ($img_width/2)-($txt_width4/2);

    list($left4,, $right4) = imageftbbox( 23, 0, $font_path2, $campus_name);
    $txt_width5 = $right4 - $left4;
    $campus_name_pos = ($img_width/2)-($txt_width5/2);

    $heading_font_color = imagecolorallocate($jpg_img, 82, 113, 255);
    $font_color = imagecolorallocate($jpg_img, 0, 0, 0);
    // center items
    imagettftext($jpg_img, 75, 0, $main_heading_pos, 766, $heading_font_color, $font_path, $name);
    imagettftext($jpg_img, 23, 0, $issuedFor_pos, 954, $font_color, $font_path2, $issuedFor);
    imagettftext($jpg_img, 23, 0, $event_date_pos, 996, $font_color, $font_path2, $event_date);
    imagettftext($jpg_img, 23, 0, $issued_on_pos, 1398, $font_color, $font_path2, $issuedOn);
    imagettftext($jpg_img, 23, 0, $campus_name_pos, 867, $font_color, $font_path2, $campus_name);
    // center items ends
    imagettftext($jpg_img, 18, 0, 335, 115, $font_color, $font_path2, $id);
}

// Output the image directly to the browser
imagejpeg($jpg_img);

// Free up memory
imagedestroy($jpg_img);
?>
