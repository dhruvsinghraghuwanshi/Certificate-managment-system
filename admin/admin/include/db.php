<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "certificate_ikgptu";
try {
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// echo "Connected successfully";
} catch(PDOException $e) {
// echo "Connection failed: " . $e->getMessage();
}
?>
<!-- 0dB)n}.dY6x+ -->