<?php
include "connection.php";
if (isset($_POST['telefoonnummer']) && $_POST['email']) {
    $telefoonnummer =  $_POST['telefoonnummer'];
    $email =  $_POST['email'];
    $user_id =  $_SESSION['user_id'];
    $user = "INSERT INTO `contact` (telefoonnummer, email, user_id)
        VALUES ('$telefoonnummer', '$email', '$user_id')";
    header("location: index.php");
    if ($conn->query($user) === FALSE) {
        echo "error" . $user . "<br />" . $conn->error;
    }
}
$conn->close();
?>

<?php

include "header.php";

?>

<h3>Voor vragen kunt uw telefoonnummer en emailadres hieronder invullen. <br>
    Wij nemen dan zo snel mogelijk contact met u op.
</h3>

<div class="container">
    <form action="" method="POST">
        <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>">
        Telefoonnummer <input type="number" name="telefoonnummer" id="telefoonnummer" required>
        <br>
        Emailadres <input type="email" name="email" id="email" required>
        <br>
        <input type="submit" name="submit" value="Verstuur">
    </form>
</div>

<?php

include "footer.php";

?>