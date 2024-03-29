<!-- This PHP code is inserting user's contact information (telephone number, email, and question) into a
database table named `contact`. It first checks if the form fields are set and not empty, then
assigns their values to variables. It also gets the user ID from the session and includes it in the
SQL query. After executing the query, it displays a success message using JavaScript. If there is an
error in executing the query, it displays an error message. Finally, it closes the database
connection. -->
<?php
include "connection.php";
if (isset($_POST['telefoonnummer']) && $_POST['email'] && $_POST['vraag']) {
    $telefoonnummer =  $_POST['telefoonnummer'];
    $email =  $_POST['email'];
    $vraag =  $_POST['vraag'];
    $user_id =  $_SESSION['user_id'];
    $user = "INSERT INTO `contact` (telefoonnummer, email, vraag, user_id)
        VALUES ('$telefoonnummer', '$email', '$vraag', '$user_id')";
    echo '<script>alert("Je gegevens zijn verstuurt en we nemen zo snel mogelijk contact met je op!")</script>';
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
        <label>Vraag<textarea name="vraag" id="vraag" rows="5" cols="50"></textarea></label>
        <br>
        <input type="submit" name="submit" value="Verstuur">
    </form>
</div>

<?php

include "footer.php";

?>