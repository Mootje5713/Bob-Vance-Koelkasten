<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (
    !isset($_SESSION['user_id']) && $_SERVER['REQUEST_URI'] != '/Bob-Vance-Koelkasten/login.php'
    && $_SERVER['REQUEST_URI'] != '/Bob-Vance-Koelkasten/register.php'
) {
    header("Location: login.php");
}
