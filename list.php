<!-- This PHP code is inserting form data submitted by the user into a MySQL database table named
`afspraak_formulier`. It first checks if all the required form fields are set, then assigns their
values to variables. It then constructs an SQL query to insert these values into the table. If the
query execution fails, it displays an error message. Finally, it closes the database connection. */
-->
<?php
include "connection.php";
if (isset($_POST['datum']) && ($_POST['adres']) && ($_POST['postcode']) && ($_POST['stad']) && ($_POST['telefoonnummer']) && ($_POST['emailadres'])) {
    $datum =  $_POST['datum'];
    $adres =  $_POST['adres'];
    $postcode =  $_POST['postcode'];
    $stad =  $_POST['stad'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $emailadres = $_POST['emailadres'];
    $user_id =  $_SESSION['user_id'];
    $user = "INSERT INTO `afspraak_formulier` (datum, adres, postcode, stad, telefoonnummer, emailadres, user_id)
        VALUES ('$datum', '$adres', '$postcode', '$stad', '$telefoonnummer', '$emailadres', '$user_id')";
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

<h3>Mocht u een afspraak willen maken voor een reparatie dan kunt u het formulier hieronder invullen en er wordt zo snel mogelijk contact met u opgenomen.</h3>

<form action="" method="POST">
    <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>">
    Datum <input type="date" name="datum" id="datum" required>
    <br>
    Adres <input type="text" name="adres" id="adres" required>
    <br>
    Postcode <input type="text" name="postcode" id="postcode" required>
    <br>
    Stad <input type="text" name="stad" id="stad" required>
    <br>
    Telefoonnummer <input type="number" name="telefoonnummer" id="telefoonnummer" required>
    <br>
    Emailadres <input type="email" name="emailadres" id="emailadres" required>
    <br>
    <input type="submit" name="submit" value="Verstuur">
</form>

<?php
include "footer.php";
?>