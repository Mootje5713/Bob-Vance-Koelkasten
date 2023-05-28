<!-- This PHP code is deleting a record from a database table called "afspraak_formulier" based on the ID
passed through the URL parameter. It first includes a file called "connection.php" which contains
the database connection details. Then it checks if the ID parameter is set in the URL. If it is, it
sets the ID variable to the value of the parameter and constructs a SQL query to delete the record
with that ID from the "afspraak_formulier" table. If the query is successful, it redirects the user
to the "index.php" page. If there is an error with the query, it displays an error message. */
-->
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