<?php
include "connection.php";
if (isset($_POST['prijs']) && ($_POST['verzekering']) && ($_POST['labels']) && ($_POST['beschrijving']) && ($_POST['image'])) {
    $prijs =  $_POST['prijs'];
    $verzekering =  $_POST['verzekering'];
    $labels =  $_POST['labels'];
    $beschrijving =  $_POST['beschrijving'];
    $image = $_POST['image'];
    $closed = $_POST['closed'];
    $user_id =  $_SESSION['user_id'];
    $user = "INSERT INTO `koelkast` (prijs, verzekering, labels, beschrijving, image, closed, user_id)
        VALUES ('$prijs', '$verzekering', '$labels', '$beschrijving', '$image', '$closed', '$user_id')";
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
        <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>">
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