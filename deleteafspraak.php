<?php
include "connection.php";

if (isset($_GET['id'])) {
    $user_id = $_SESSION['user_id'];
    $query = "DELETE FROM `afspraak_formulier` WHERE user_id = $user_id";
    $result = $conn->query($query);
    if ($result === FALSE) {
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