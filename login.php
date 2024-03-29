<!-- This is a PHP code that handles the login functionality of a website. It checks if the username and
password are set in the POST request, then queries the database to check if the username exists. If
the username exists, it checks if the password matches the hashed password stored in the database
using the password_verify() function. If the password is correct, it sets the user_id and username
in the session and redirects the user to the index.php page. If the username or password is
incorrect, it displays an error message using JavaScript alert(). -->
<?php
include "connection.php";
if (isset($_POST['username']) && ($_POST['password'])) {
    $username =  $_POST['username'];
    $password =  $_POST['password'];
    $query = "SELECT * FROM `user` WHERE username = '$username' ";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                sleep(3);
                if (password_verify($password, $row['password'])) {
                    $_SESSION["user_id"] = $row['id'];
                    $_SESSION["username"] = $row['username'];
                } else {
                    echo '<script>alert("Wachtwoord niet gevonden!")</script>';
                }
            }
        } else {
            sleep(3);
            echo '<script>alert("Gebruiker niet gevonden!")</script>';
        }
    }
}
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
}
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
    <form method="POST">
        Gebruikersnaam <input type="text" name="username" id="username" required>
        <br>
        Wachtwoord <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" name="submit" value="sign in">
        Nog geen account <a href="register.php">klik hier</a>
    </form>
</body>

</html>