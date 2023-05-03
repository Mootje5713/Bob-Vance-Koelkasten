<?php
include "connection.php";
if (isset($_GET['id'])) {
    $owner_id = $_SESSION['owner_id'];
    $query = "UPDATE koelkast SET closed = NOW()";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        header("Location: koelkast.php");
    }
}
?>

<?php
include "header.php";
?>

<?php
include "footer.php";
?>