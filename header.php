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
    <p>Hallo! <?php echo $_SESSION['username']; ?> &nbsp; <a href="logout.php">logout</a> </p>
    <h1>Welkom op de webiste van Bob Vance</h1>
    <div class="topnav">
        <a href="index.php">Portaal</a>
        <a href="koelkast.php">Koelkast</a>
        <a href="about-us.php">Over Mij</a>
        <a href="contact.php">Contact</a>
        <a href="list.php">Afspraak formulier</a>
    </div>