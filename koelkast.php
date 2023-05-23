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
<?php if (!$koelkasten) :
    echo "<h3>U heeft geen aankopen</h3>";
else :
?>
    <?php foreach ($koelkasten as $row) : ?>
        <ul>
            <li>
                <table>
                    <?php if (!$row['closed']) : ?>
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
                            <h3><?php echo $row['prijs']; ?></h3>
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
                    <?php else : ?>
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
                            <h3><s><?php echo $row['prijs']; ?></s></h3>
                        </td>
                        <td>
                            <h3><s><?php echo $row['verzekering']; ?></s></h3>
                        </td>
                        <td>
                            <h3><s><?php echo $row['labels']; ?></s></h3>
                        </td>
                        <td>
                            <h3><s><?php echo $row['beschrijving']; ?></s></h3>
                        </td>
                        <td>
                            <h3><?php echo "<img src='{$row['image']}' width=100px height=100px'>"; ?></h3>
                        </td>
                    <?php endif; ?>
                    <div class="del">
                        <?php if (!$row['closed']) : ?>
                            <button onclick="window.location.href='updateaankoop.php?id=<?php echo $_SESSION['user_id']; ?>'">Aankoop wijzigen</button>
                            <button onclick="window.location.href='closeaankoop.php?id=<?php echo $_SESSION['user_id']; ?>'">Aankoop sluiten</button>
                        <?php else : ?>
                            <button onclick="if(confirm('Weet u het zeker?'))window.location.href='deleteaankoop.php?id=<?php echo $_SESSION['user_id']; ?>'"> Aankoop verwijderen</button>
                            <button onclick="window.location.href='openaankoop.php?id=<?php echo $_SESSION['user_id']; ?>'">Aankoop openen</button>
                        <?php endif; ?>
                    </div>
                </table>
            </li>
        </ul>
    <?php endforeach; ?>
<?php endif; ?>
<?php
include "footer.php";
?>