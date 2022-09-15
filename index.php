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
                        <?php if ($afspraak['closed']) : ?>
                            <h3><s><?php echo $row['datum'] ?></s></h3>
                            <h3><s><?php echo $row['adres'] ?></s></h3>
                            <h3><s><?php echo $row['postcode'] ?></s></h3>
                            <h3><s><?php echo $row['stad'] ?></s></h3>
                            <h3><s><?php echo $row['telefoonnummer'] ?></s></h3>
                            <h3><s><?php echo $row['emailadres'] ?></s></h3>
                        <?php else : ?>
                            <h3><?php echo $row['datum'] ?></h3>
                            <h3><?php echo $row['adres'] ?></h3>
                            <h3><?php echo $row['postcode'] ?></h3>
                            <h3><?php echo $row['stad'] ?></h3>
                            <h3><?php echo $row['telefoonnummer'] ?></h3>
                            <h3><?php echo $row['emailadres'] ?></h3>
                        <?php endif; ?>
                        <div class="del">
                            <?php if ($afspraak['closed']) : ?>
                                <a href="deleteafspraak.php?id=<?php echo $_SESSION['user_id'] ?>">afspraak verwijderen</a>
                                <a href="openafspraak.php?id=<?php echo $_SESSION['user_id'] ?>">afspraak openen</a>
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