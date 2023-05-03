<?php
include "connection.php";

if (isset($_GET['id'])) {
    $query = "DELETE FROM `koelkast` WHERE id";
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