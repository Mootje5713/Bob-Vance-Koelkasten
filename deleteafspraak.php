<?php
include "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM afspraak_formulier WHERE id = '$id'";
    if ($conn->query($query) ===  FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        header("Location: index.php");
    }
}
?>
<?php
include "header.php";
?>

<?php
include "footer.php";
?>