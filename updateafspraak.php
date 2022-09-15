<?php

include "connection.php";

if (isset($_GET['id'])) {
    $query = "SELECT * FROM `user` WHERE id ='" . $_GET["id"] . "'";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) 
            {
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
    $query = "UPDATE afspraak_formulier SET datum = '$datum', adres = '$adres', postcode = '$postcode', stad = '$stad', telefoonnummer = '$telefoonnummer', emailadres = '$emailadres' WHERE id = '$user_id'";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        header("Location: index.php");
    }
}

?>

<?php include "header.php"; ?>
<form method="POST">
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
    <button type="submit" name="submit"> wijzig </button>
</form>
<?php include "footer.php"; ?>