<!-- This is a PHP code that retrieves data from a database table called "koelkast" based on the ID
passed through the URL parameter (['id']). It then displays the retrieved data in a form with
input fields for editing. When the form is submitted, the updated data is sent to the database to
update the corresponding record using an SQL UPDATE query. If the query is successful, the user is
redirected to the "koelkast.php" page. -->
<?php

include "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `koelkast` WHERE id = '$id'";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $koelkast[] = $row;
                $prijs = $row['prijs'];
                $verzekering = $row['verzekering'];
                $labels = $row['labels'];
                $beschrijving = $row['beschrijving'];
                $image = $row['image'];
                $user_id = $_SESSION['user_id'];
            }
        }
    }
}

if (isset($_POST['submit'])) {
    $prijs = $_POST['prijs'];
    $verzekering = $_POST['verzekering'];
    $labels = $_POST['labels'];
    $beschrijving = $_POST['beschrijving'];
    $image = $_POST['image'];
    $user_id = $_SESSION['user_id'];
    $query = "UPDATE `koelkast` SET `prijs`= $prijs, `verzekering`= '$verzekering', `labels`= '$labels', `beschrijving`= '$beschrijving', `image`= '$image' WHERE id = $id";
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
    Verzekering <input type="text" name="verzekering" id="verzekering" value="<?php echo $verzekering; ?>">
    <br>
    Labels <input type="text" name="labels" id="labels" value="<?php echo $labels; ?>">
    <br>
    Beschrijving <input type="text" name="beschrijving" id="beschrijving" value="<?php echo $beschrijving; ?>">
    <br>
    Afbeelding <input type="file" name="image" id="image" value="<?php echo $image; ?>">
    <br>
    <button type="submit" name="submit">Wijzig</button>
</form>
<?php include "footer.php"; ?>