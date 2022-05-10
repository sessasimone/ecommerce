<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sessa_ecommerce_db3";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>