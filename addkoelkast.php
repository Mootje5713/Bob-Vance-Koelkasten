<!-- This is a PHP code that inserts data into a MySQL database table named "koelkast". It first checks
if the required form fields (prijs, verzekering, labels, beschrijving, and image) are set using the
isset() function. If they are set, it retrieves the values of these fields using the 
superglobal array and assigns them to variables. It also retrieves the user ID from the session
variable ['user_id'] and assigns it to the  variable. -->
<?php
include "connection.php";
if (isset($_POST['prijs']) && ($_POST['verzekering']) && ($_POST['labels']) && ($_POST['beschrijving']) && ($_POST['image'])) {
    $prijs =  $_POST['prijs'];
    $verzekering =  $_POST['verzekering'];
    $labels =  $_POST['labels'];
    $beschrijving =  $_POST['beschrijving'];
    $image = $_POST['image'];
    $user_id =  $_SESSION['user_id'];
    $user = "INSERT INTO `koelkast` (prijs, verzekering, labels, beschrijving, image, user_id)
        VALUES ('$prijs', '$verzekering', '$labels', '$beschrijving', '$image', '$user_id')";
    header("location: koelkast.php");
    if ($conn->query($user) === FALSE) {
        echo "error" . $user . "<br />" . $conn->error;
    }
}
$conn->close();
?>

<?php
include "header.php";
?>

<div class="container">
    <form action="" method="POST">
        <input type="hidden" value="<?php echo $_SESSION['username']; ?>">
        Prijs <input type="number" name="prijs" id="prijs" required>
        <br>
        Verzekering <input type="text" name="verzekering" id="verzekering" required>
        <br>
        Labels <input type="text" name="labels" id="labels" required>
        <br>
        Beschrijving <input type="text" name="beschrijving" id="beschrijving" required>
        <br>
        Afbeelding <input type="file" name="image" id="image" required>
        <br>
        <input type="submit" name="submit" value="Verstuur">
    </form>
</div>

<?php
include "footer.php";
?>