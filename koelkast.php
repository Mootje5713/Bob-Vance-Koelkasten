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