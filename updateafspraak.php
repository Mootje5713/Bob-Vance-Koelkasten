<?php

include "connection.php";

if (isset($_GET['id'])) {
    $query = "SELECT * FROM `afspraak_formulier` WHERE user_id ='" . $_GET["id"] . "'";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $afspraak_formulier[] = $row;
            }
        }
    }
}

if (isset($_POST['submit'])) {
    $datum = $_POST['datum'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $stad = $_POST['stad'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $emailadres = $_POST['emailadres'];
    $user_id = $_SESSION['user_id'];
    $query = "UPDATE afspraak_formulier SET datum = '$datum', adres = '$adres', postcode = '$postcode', stad = '$stad', telefoonnummer = '$telefoonnummer', emailadres = '$emailadres'";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        header("Location: index.php");
    }
}

?>

<?php include "header.php"; ?>
<form action="" method="POST">
    Datum <input type="date" name="datum" id="datum">
    <br>
    Adres <input type="text" name="adres" id="adres">
    <br>
    Postcode <input type="text" name="postcode" id="postcode">
    <br>
    Stad <input type="text" name="stad" id="stad">
    <br>
    Telefoonnummer <input type="number" name="telefoonnummer" id="telefoonnummer">
    <br>
    Emailadres <input type="email" name="emailadres" id="emailadres">
    <br>
    <button type="submit" name="submit"> Wijzig </button>
</form>
<?php include "footer.php"; ?>