<?php
include "connection.php";
?>

<?php
include "header.php";
?>
<div class="intro">
    <p>Op deze webiste zijn hier allerlei koelkasten te vinden.
        Ook kan je een koelkast bestellen en laten reparen.
    </p>
</div>

<h3>Uw afspraken</h3>
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
    echo "<h1>je hebt geen nog geen afspraken staan</h1>";
else :
?>
    <?php foreach ($afspraak_formulier as $row) : ?>
        <ul>
            <li>
                <table>
                    <tr>
                        <h3><?php echo $row['datum'] ?></h3>
                        <h3><?php echo $row['adres'] ?></h3>
                        <h3><?php echo $row['postcode'] ?></h3>
                        <h3><?php echo $row['stad'] ?></h3>
                        <h3><?php echo $row['telefoonnummer'] ?></h3>
                        <h3><?php echo $row['emailadres'] ?></h3>
                        <div class="del">
                            <?php if (['closed'] == NULL) : ?>
                                <a href="openafspraak.php?id=<?php echo $_SESSION['user_id'] ?>">afspraak openen</a>
                                <a href="deleteafspraak.php?id=<?php echo $_SESSION['user_id'] ?>">afspraak verwijderen</a>
                            <?php else : ?>
                                <a href="updateafspraak.php?id=<?php echo $_SESSION['user_id'] ?>">afspraak wijzigen</a>
                                <a href="closeafspraak.php?id=<?php echo $_SESSION['user_id'] ?>">afspraak sluiten</a>
                            <?php endif; ?>
                        </div>
                    </tr>
                </table>
            </li>
        </ul>
    <?php endforeach; ?>
<?php endif; ?>
<?php
include "footer.php";
?>