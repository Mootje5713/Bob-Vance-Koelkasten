<?php
include "connection.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM `koelkast` WHERE id = $id";
    if ($conn->query($query) === TRUE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        header("Location: koelkast.php");
    }
}
?>
<?php
include "header.php";
?>

<form action="" method="POST">
    <input type="hidden" name="id">
    <input type="submit" name="submit" value="Aankoop verwijderen">
</form>

<?php
include "footer.php";
?>