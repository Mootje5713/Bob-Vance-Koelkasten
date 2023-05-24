<!DOCTYPE html>
<html lang="en">

<head>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bob Vance</title>
</head>

<body>
    <p>Welkom! <?php echo $_SESSION['username']; ?> &nbsp; <a href="logout.php">logout</a></p>
    <h1>Fride-shop</h1>
    <div class="topnav">
        <a href="index.php">Portaal</a>
        <a href="koelkast.php">Koelkasten</a>
        <a href="over-mij.php">Over Mij</a>
        <a href="contact.php">Contact</a>
        <a href="addkoelkast.php">Voeg een koelkast toe</a>
        <a href="list.php">Reparatie</a>
    </div>