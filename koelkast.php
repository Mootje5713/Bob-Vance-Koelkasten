<!-- This PHP code is retrieving data from a MySQL database table called "koelkast" for the current user,
ordering it by ID in descending order, and storing it in an array called "". It first
includes the "connection.php" file to establish a connection to the database. Then, it creates a SQL
query to select all columns from the "koelkast" table where the user_id matches the current user's
ID, orders the results by ID in descending order, and executes the query using the  object. If
the query fails, it displays an error message. If the query succeeds and returns one or more rows,
it loops through each row and adds it to the  array. Finally, the code checks if the
array is not empty and displays the purchase details in a table format if it is not
empty. -->
<?php
include "connection.php";
$query = "SELECT * FROM `koelkast` WHERE user_id='" . $_SESSION["user_id"] . "' ORDER BY id DESC";
$result = $conn->query($query);
if ($conn->query($query) === FALSE) {
    echo "error" . $query . "<br />" . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $koelkasten[] = $row;
        }
    }
}
?>

<?php
include "header.php";
?>

<!-- This is a PHP code that displays a list of purchases made by a user. It first retrieves the data
from the database table "koelkast" for the current user, orders it by ID in descending order, and
stores it in an array called . Then, it checks if the array is not empty and loops
through each item in the array to display the purchase details in a table format. The details
include the price, insurance, labels, description, and image of the purchased item. It also provides
buttons to edit or delete the purchase. If the array is empty, it displays a message saying that the
user has no purchases. -->
<h2>Uw aankoop overzicht</h2>
<?php if (isset($koelkasten) && !empty($koelkasten)) : ?>
    <?php foreach ($koelkasten as $row) : ?>
        <ul>
            <li>
                <table>
                    <tr>
                        <th>
                            Prijs
                        </th>
                        <th>
                            Verzekering
                        </th>
                        <th>
                            Labels
                        </th>
                        <th>
                            Beschrijving
                        </th>
                        <th>
                            Afbeelding
                        </th>
                    </tr>
                    <td>
                        <h3>€ <?php echo $row['prijs']; ?>;</h3>
                    </td>
                    <td>
                        <h3><?php echo $row['verzekering']; ?></h3>
                    </td>
                    <td>
                        <h3><?php echo $row['labels']; ?></h3>
                    </td>
                    <td>
                        <h3><?php echo $row['beschrijving']; ?></h3>
                    </td>
                    <td>
                        <h3><?php echo "<img src='{$row['image']}' width=100px height=100px'>"; ?> </h3>
                    </td>
                    <div class="del">
                        <button onclick="window.location.href='updateaankoop.php?id=<?php echo $row['id']; ?>'">Aankoop wijzigen</button>
                        <button onclick="if(confirm('Weet u het zeker?'))window.location.href='deleteaankoop.php?id=<?php echo $row['id']; ?>'"> Aankoop verwijderen</button>
                    </div>
                </table>
            </li>
        </ul>
    <?php endforeach; ?>
<?php else : ?>
    <h3>U heeft geen aankopen</h3>
<?php endif; ?>

<?php
include "footer.php";
?>