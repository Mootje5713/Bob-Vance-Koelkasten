<?php
include "connection.php";
$query = "SELECT * FROM `afspraak_formulier` WHERE user_id=" . $_SESSION["user_id"] . "";
$result = $conn->query($query);
if ($conn->query($query) === FALSE) {
    echo "error" . $query . "<br />" . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $afspraak = $row;
        }
    }
}

$query =
"SELECT * FROM `koelkast`";
$result = $conn->query($query);
if ($conn->query($query) === FALSE) {
    echo "error" . $query . "<br />" . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $koelkast = $row;
        }
    }
}
?>

<?php
include "header.php";
?>

<h2>
    Op voorraad
</h2>

<?php foreach ($koelkast as $row) : ?>
    <ul>
        <li>
            <table>
                <tr>
                    <th>
                        Prijs
                    </th>
                    <th>
                        Vezekering
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
                    <h3><?php echo $row['prijs'] ?></h3>
                </td>
                <td>
                    <h3><?php echo $row['vezekering'] ?></h3>
                </td>
                <td>
                    <h3><?php echo $row['labels'] ?></h3>
                </td>
                <td>
                    <h3><?php echo $row['beschrijving'] ?></h3>
                </td>
                <td>
                    <h3><?php echo "<img src='{$row['image']}' width=100px height=100px'>"; ?> </h3>
                </td>
                <div class="del">
                    <?php if ($afspraak['closed']) : ?>
                        <button onclick="if(confirm('Weet u het zeker?'))window.location.href='deleteaankoop.php?id=<?php echo $_SESSION['user_id']; ?>'"> aankoop verwijderen</button>
                        <button onclick="window.location.href='openaankoop.php?id=<?php echo $_SESSION['user_id']; ?>'">aankoop openen</button>
                    <?php else : ?>
                        <button onclick="window.location.href='updateaankoop.php?id=<?php echo $_SESSION['user_id']; ?>'">aankoop wijzigen</button>
                        <button onclick="window.location.href='closeaankoop.php?id=<?php echo $_SESSION['user_id']; ?>'">aankoop sluiten</button>
                    <?php endif; ?>
                </div>
            </table>
        </li>
    </ul>
<?php endforeach; ?>
<?php
include "footer.php";
?>