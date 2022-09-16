<?php
include "connection.php";

if (isset($_GET['id'])) {
    $query = "UPDATE afspraak_formulier SET closed = NULL";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        header("Location: index.php");
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