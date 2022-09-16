<?php
include "connection.php";


if (isset($_POST['first_name']) && ($_POST['last_name']) && ($_POST['username']) && ($_POST['email']) && ($_POST['password'])) {
    $first_name =  $_POST['first_name'];
    $last_name =  $_POST['last_name'];
    $username =  $_POST['username'];
    $email =  $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user = "INSERT INTO `user` (first_name, last_name, username, email, password)
        VALUES ('$first_name', '$last_name', '$username', '$email', '$password')";
    header("location: login.php");
    if ($conn->query($user) === FALSE) {
        echo "error" . $user . "<br />" . $conn->error;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bob Vance</title>
</head>

<body>
    <h1>Welkom op de webiste van Fridge-shop</h1>
    <a href="login.php">Terug</a>
    <form action="" method="POST">
        Voornaam <input type="text" name="first_name" id="first_name" required>
        <br>
        Achernaam <input type="text" name="last_name" id="last_name" required>
        <br>
        Gebruikersnaam <input type="text" name="username" id="username" required>
        <br>
        Emailadres <input type="email" name="email" id="email" required>
        <br>
        Wachtwoord <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" name="submit" value="sign up">
    </form>
</body>

</html>