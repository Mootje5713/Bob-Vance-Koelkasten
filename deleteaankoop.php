<!-- This PHP code is deleting a record from a database table named "koelkast" based on the ID passed
through the URL parameter. It first includes a file named "connection.php" which contains the
database connection details. Then it checks if the ID parameter is set in the URL. If it is set, it
creates a SQL query to delete the record with the matching ID from the "koelkast" table. If the
query execution fails, it displays an error message. If the query execution is successful, it
redirects the user to the "koelkast.php" page. -->
<?php
include "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM koelkast WHERE id = '$id'"; 
    if ($conn->query($query) ===  FALSE) {
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