<?php
$servername = "localhost";
$serverusername = "root";
$password = "";
$dbname = "attendance";

// Create connection
$conn = new mysqli($servername, $serverusername, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>