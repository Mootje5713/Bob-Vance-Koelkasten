<?php
include "connection.php";
if (isset($_POST['first_name']) && ($_POST['last_name']) && ($_POST['username'])
    && ($_POST['email']) && ($_POST['password'])) {
    $first_name =  $_POST['first_name'];
    $last_name =  $_POST['last_name'];
    $username =  $_POST['username'];
    $email =  $_POST['email'];
    $password =  $_POST['password'];
    $user = "INSERT INTO `user`(first_name, last_name, username, email, password)
        VALUES ('$first_name', '$last_name', '$username', '$email', '$password')";
    header("location: login.php");
    if ($conn->query($user) === FALSE) {
        echo "error" . $user . "<br />" . $conn->error;
    } else {
    }
}
$conn->close();
?>
<?php

include "header.php";

?>

<form action="" method="POST">
    firstname <input type="text" name="first_name" id="first_name" required>
    <br>
    lastname <input type="text" name="last_name" id="last_name" required>
    <br>
    username <input type="text" name="username" id="username" required>
    <br>
    email <input type="text" name="email" id="email" required>
    <br>
    password <input type="password" name="wachtwoord" id="wachtwoord" required>
    <br>
    <input type="submit" name="submit" value="sign up">
</form>

<?php

include "footer.php";

?>