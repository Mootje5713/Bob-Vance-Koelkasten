<?php
include "connection.php";
if (isset($_POST['username']) && ($_POST['password'])) {
    $username =  $_POST['username'];
    $password =  $_POST['password'];
    $user = "INSERT INTO `user`(first_name, last_name, username, email, password)
        VALUES ('$username', '$password')";
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
    username <input type="text" name="username" id="username" required>
    <br>
    password <input type="password" name="wachtwoord" id="wachtwoord" required>
    <br>
    <input type="submit" name="submit" value="sign up">
</form>

<?php

include "footer.php";

?>