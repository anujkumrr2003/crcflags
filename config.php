<?php 
// error_reporting(0);
$conn = new mysqli('localhost', 'root', '', 'crcflag');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>