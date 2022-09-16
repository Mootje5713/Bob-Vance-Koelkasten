<?php

include "connection.php";

if (isset($_GET['id'])) {
    $query = "SELECT * FROM `koelkast`";
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
    $prijs = $_POST['prijs'];
    $vezekering = $_POST['vezekering'];
    $labels = $_POST['labels'];
    $beschrijving = $_POST['beschrijving'];
    $image = $_POST['image'];
    $query = "UPDATE koelkast SET prijs = '$prijs', vezekering = '$vezekering', labels = '$labels', beschrijving = '$beschrijving', image = '$image', emailadres = '$emailadres'";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        header("Location: koelkast.php");
    }
}

?>

<?php include "header.php"; ?>
<form method="POST">
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
    <button type="submit" name="submit"> wijzig </button>
</form>
<?php include "footer.php"; ?>