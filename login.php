<?php
include "connection.php";
if (isset($_POST['username']) && ($_POST['password'])) {
    $username =  $_POST['username'];
    $password =  $_POST['password'];
    $query = "SELECT * FROM `user` WHERE username = '$username' 
        AND password = '$password'";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["user_id"] = $row['id'];
                $_SESSION["username"] = $row['username'];
            }
        }
    }
}
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
} else {
    echo "fout";
}
?>
<?php

include "header.php";

?>
<a href="register.php">Nog geen account klik hier</a>

<form method="POST">
    username <input type="text" name="username" id="username" required>
    <br>
    password <input type="password" name="password" id="password" required>
    <br>
    <input type="submit" name="submit" value="sign in">
    nog geen account <a href="register.php">klik hier</a>
</form>

<?php

include "footer.php";

?>