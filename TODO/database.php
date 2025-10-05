<?php
$servername = "localhost";
$username = "root"; // change if needed
$password = ""; // change if needed
$database = "dehardun";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
