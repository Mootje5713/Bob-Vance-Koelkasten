<?php
include "connection.php";
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

<?php
include "header.php";
?>
<h2>Fridge-shop</h2>
<p class="intro">
    Op deze webiste zijn hier allerlei soorten koelkasten te vinden.
    <br>
    Met ook allerlei soorten vezekeringen, prijzen en energie labels.
    <br>
    <br>
    Ook kunt u een koelkast bestellen en laten reparen.
    <br>
    Op deze website kunt u ook lezen waarom ik deze bedrijf heb opgericht en wie ik zelf ben.
    <br>
    Veel shopplezier!
</p>

<h2>Uw afspraken overzicht</h2>
<?php if (isset($afspraak_formulier) && !empty($afspraak_formulier)) : ?>
    <?php foreach ($afspraak_formulier as $row) : ?>
        <ul>
            <li>
                <table>
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
                    <div class="del">
                        <button onclick="if(confirm('Weet u het zeker?'))window.location.href='deleteafspraak.php?id=<?php echo $row['id']; ?>'"> Afspraak verwijderen</button>
                        <button onclick="window.location.href='updateafspraak.php?id=<?php echo $row['id']; ?>'">Afspraak wijzigen</button>
                    </div>
                </table>
            </li>
        </ul>
    <?php endforeach; ?>
<?php else : ?>
    <h3>U heeft geen afspraken open staan</h3>
<?php endif; ?>

<?php
include "footer.php";
?>