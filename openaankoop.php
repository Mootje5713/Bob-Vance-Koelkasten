<?php
include "connection.php";

if (isset($_GET['id'])) {
    $owner_id = $_SESSION['owner_id'];
    $query = "UPDATE koelkast SET closed = NULL";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        header("Location: koelkast.php");
    }
    $result = $conn->query($action);
    if ($result === FALSE) {
        echo "error" . $action . "<br />" . $conn->error;
    }
}

?>
<?php
include "header.php";
?>
<?php
include "footer.php";
?>