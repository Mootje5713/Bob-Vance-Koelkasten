<!-- This is a PHP code that retrieves data from a database table called `afspraak_formulier` based on
the `id` parameter passed through the URL using the GET method. It then displays the retrieved data
in a form for editing. When the form is submitted, it updates the corresponding record in the
database table with the new values entered in the form. If the update is successful, it redirects
the user to the `index.php` page. -->
<?php

include "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `afspraak_formulier` WHERE id =$id ";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $afspraak_formulier[] = $row;
                $datum = $row['datum'];
                $adres = $row['adres'];
                $postcode = $row['postcode'];
                $stad = $row['stad'];
                $telefoonnummer = $row['telefoonnummer'];
                $emailadres = $row['emailadres'];
                $user_id = $_SESSION['user_id'];
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
    $query = "UPDATE afspraak_formulier SET datum = '$datum', adres = '$adres', postcode = '$postcode', stad = '$stad', telefoonnummer = '$telefoonnummer', emailadres = '$emailadres' WHERE id = $id";
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
    Datum <input type="date" name="datum" id="datum" value="<?php echo $datum; ?>">
    <br>
    Adres <input type="text" name="adres" id="adres" value="<?php echo $adres; ?>">
    <br>
    Postcode <input type="text" name="postcode" id="postcode" value="<?php echo $datum; ?>">
    <br>
    Stad <input type="text" name="stad" id="stad" value="<?php echo $stad; ?>">
    <br>
    Telefoonnummer <input type="number" name="telefoonnummer" id="telefoonnummer" value="<?php echo $telefoonnummer; ?>">
    <br>
    Emailadres <input type="email" name="emailadres" id="emailadres" value="<?php echo $emailadres; ?>">
    <br>
    <button type="submit" name="submit"> Wijzig </button>
</form>
<?php include "footer.php"; ?>