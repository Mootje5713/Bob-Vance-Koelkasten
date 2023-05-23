<?php

include "connection.php";

if (isset($_GET['id'])) {
    $query = "SELECT * FROM `koelkast` WHERE user_id ='" . $_SESSION["user_id"] . "'";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $koelkast[] = $row;
            }
        }
    }
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $prijs = $_POST['prijs'];
    $verzekering = $_POST['verzekering'];
    $labels = $_POST['labels'];
    $beschrijving = $_POST['beschrijving'];
    $image = $_POST['image'];
    $user_id = $_SESSION['user_id'];
    $query = "UPDATE `koelkast` SET `prijs`= $prijs, `verzekering`= '$verzekering', `labels`= '$labels', `beschrijving`= '$beschrijving', `image`= '$image'";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        header("Location: koelkast.php");
    }
}
?>

<?php include "header.php"; ?>
<form action="" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    Prijs <input type="number" name="prijs" id="prijs" value="<?php echo $prijs; ?>">
    <br>
    Verzekering <input type="text" name="verzekering" id="verzekering">
    <br>
    Labels <input type="text" name="labels" id="labels">
    <br>
    Beschrijving <input type="text" name="beschrijving" id="beschrijving">
    <br>
    Afbeelding <input type="file" name="image" id="image">
    <br>
    <button type="submit" name="submit">Wijzig</button>
</form>
<?php include "footer.php"; ?>