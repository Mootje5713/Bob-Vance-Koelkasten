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
?>

<?php
include "header.php";
?>
<h2>Fridge-shop</h2>
<div class="intro">
    <p>
        Op deze webiste zijn hier allerlei soorten koelkasten te vinden.
        <br>
        Met ook allerlei soorten vezekeringen, prijzen en energie labels.
        <br>
        <br>
        Ook kunt u een koelkast bestellen en laten reparen.
        <br>
        Op deze website kunt u ook lezen waarom ik deze bedrijf heb opgericht en wie ik zelf ben.
        <br>
        <br>
        Veel shopplezier!
    </p>
</div>

<h2>Uw afspraken overzicht</h2>
<?php
$query = "SELECT * FROM `afspraak_formulier` WHERE user_id='" . $_SESSION["user_id"] . "' ORDER BY id DESC";
$result = $conn->query($query);
if ($conn->query($query) === FALSE) {
    echo "error" . $query . "<br />" . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $afspraak_formulier[] = $row;
        }
    }
}
?>
<?php if (!isset($afspraak_formulier)) :
    echo "<h3>U heeft geen afspraken open staan</h3>";
else :
?>
    <?php foreach ($afspraak_formulier as $row) : ?>
        <ul>
            <li>
                <table>
                    <?php if ($afspraak['closed']) : ?>
                        <tr>
                            <th>
                                datum
                            </th>
                            <th>
                                adres
                            </th>
                            <th>
                                postcode
                            </th>
                            <th>
                                stad
                            </th>
                            <th>
                                telefoonnummer
                            </th>
                            <th>
                                emailadres
                            </th>
                        </tr>
                        <td>
                            <h3><s><?php echo $row['datum'] ?></s></h3>
                        </td>
                        <td>
                            <h3><s><?php echo $row['adres'] ?></s></h3>
                        </td>
                        <td>
                            <h3><s><?php echo $row['postcode'] ?></s></h3>
                        </td>
                        <td>
                            <h3><s><?php echo $row['stad'] ?></s></h3>
                        </td>
                        <td>
                            <h3><s><?php echo $row['telefoonnummer'] ?></s></h3>
                        </td>
                        <td>
                            <h3><s><?php echo $row['emailadres'] ?></s></h3>
                        </td>
                    <?php else : ?>
                        <tr>
                            <th>
                                Datum
                            </th>
                            <th>
                                Adres
                            </th>
                            <th>
                                Postcode
                            </th>
                            <th>
                                Stad
                            </th>
                            <th>
                                Telefoonnummer
                            </th>
                            <th>
                                Emailadres
                            </th>
                        </tr>
                        <td>
                            <h3><?php echo $row['datum'] ?></h3>
                        </td>
                        <td>
                            <h3><?php echo $row['adres'] ?></h3>
                        </td>
                        <td>
                            <h3><?php echo $row['postcode'] ?></h3>
                        </td>
                        <td>
                            <h3><?php echo $row['stad'] ?></h3>
                        </td>
                        <td>
                            <h3><?php echo $row['telefoonnummer'] ?></h3>
                        </td>
                        <td>
                            <h3><?php echo $row['emailadres'] ?></h3>
                        </td>
                    <?php endif; ?>
                    <div class="del">
                        <?php if ($afspraak['closed']) : ?>
                            <button onclick="if(confirm('Weet u het zeker?'))window.location.href='deleteafspraak.php?id=<?php echo $_SESSION['user_id']; ?>'"> afspraak verwijderen</button>
                            <button onclick="window.location.href='openafspraak.php?id=<?php echo $_SESSION['user_id']; ?>'">afspraak openen</button>
                        <?php else : ?>
                            <button onclick="window.location.href='updateafspraak.php?id=<?php echo $_SESSION['user_id']; ?>'">afspraak wijzigen</button>
                            <button onclick="window.location.href='closeafspraak.php?id=<?php echo $_SESSION['user_id']; ?>'">afspraak sluiten</button>
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