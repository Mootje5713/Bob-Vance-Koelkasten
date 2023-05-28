<!-- This is a PHP code that starts a session, connects to a MySQL database, and checks if the user is
logged in. If the user is not logged in and is not on the login or register page, the code redirects
them to the login page. -->
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])
    && $_SERVER['REQUEST_URI'] != '/Bob-Vance-Koelkasten/login.php'
    && $_SERVER['REQUEST_URI'] != '/Bob-Vance-Koelkasten/register.php'
) {
    header("Location: login.php");
}