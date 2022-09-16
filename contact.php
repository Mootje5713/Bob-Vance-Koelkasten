<?php
include "connection.php";
if (isset($_POST['telefoonnummer']) && $_POST['email']) {
    $telefoonnummer =  $_POST['telefoonnummer'];
    $email =  $_POST['email'];
    $user = "INSERT INTO `contact` (telefoonnummer, email)
        VALUES ('$telefoonnummer', '$email')";
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
    Wij nemen dan snel mogelijk contact met u op.
</h3>

<div class="container">
    <form action="" method="POST">
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