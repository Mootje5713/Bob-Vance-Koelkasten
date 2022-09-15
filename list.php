<?php
include "connection.php";
if (isset($_POST['datum']) && ($_POST['adres']) && ($_POST['postcode']) && ($_POST['stad']) && ($_POST['telefoonnummer']) && ($_POST['emailadres'])) {
    $datum =  $_POST['datum'];
    $adres =  $_POST['adres'];
    $postcode =  $_POST['postcode'];
    $stad =  $_POST['stad'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $emailadres = $_POST['emailadres'];
    $closed = $_POST['closed'];
    $user_id =  $_SESSION['user_id'];
    $user = "INSERT INTO `afspraak_formulier` (datum, adres, postcode, stad, telefoonnummer, emailadres, closed, user_id)
        VALUES ('$datum', '$adres', '$postcode', '$stad', '$telefoonnummer', '$emailadres', '$closed', '$user_id')";
    header("location: index.php");
    echo '<script>alert("De afspraak is verstuurd we nemen zo snel mogelijk contact met u op.")</script>';
    if ($conn->query($user) === FALSE) {
        echo "error" . $user . "<br />" . $conn->error;
    }
}
$conn->close();
?>

<?php
include "header.php";
?>

<h2>Mocht u een afspraak willen maken voor een reparatie dan kunt het formulier hieronder invullen.</h2>

<form action="" method="POST">
    <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>">
    datum <input type="date" name="datum" id="datum" required>
    <br>
    adres <input type="text" name="adres" id="adres" required>
    <br>
    postcode <input type="text" name="postcode" id="postcode" required>
    <br>
    stad <input type="text" name="stad" id="stad" required>
    <br>
    telefoonnummer <input type="number" name="telefoonnummer" id="telefoonnummer" required>
    <br>
    emailadress <input type="email" name="emailadres" id="emailadres" required>
    <br>
    <input type="submit" name="submit" value="Verstuur">
</form>

<?php
include "footer.php";
?>