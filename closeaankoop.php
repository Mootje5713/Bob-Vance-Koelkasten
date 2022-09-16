<?php
include "connection.php";
if (isset($_GET['id'])) {
    $query = "UPDATE afspraak_formulier SET closed = NOW()";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        header("Location: index.php");
    }
}

?>
?>
<?php
include "header.php";
?>
<?php
include "footer.php";
?>