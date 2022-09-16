<?php
include "connection.php";
if (isset($_POST['prijs']) && ($_POST['vezekering']) && ($_POST['labels']) && ($_POST['beschrijving']) && ($_POST['image'])) {
    $prijs =  $_POST['prijs'];
    $vezekering =  $_POST['vezekering'];
    $labels =  $_POST['labels'];
    $beschrijving =  $_POST['beschrijving'];
    $image = $_POST['image'];
    $user = "INSERT INTO `koelkast` (prijs, vezekering, labels, beschrijving, image)
        VALUES ('$prijs', '$vezekering', '$labels', '$beschrijving', '$image')";
    header("location: koelkast.php");
    if ($conn->query($user) === FALSE) {
        echo "error" . $user . "<br />" . $conn->error;
    }
}
?>

<?php
include "header.php";
?>



<div class="container">
    <form action="" method="POST">
        Prijs <input type="number" name="prijs" id="prijs" required>
        <br>
        Vezekering <input type="text" name="vezekering" id="vezekering" required>
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