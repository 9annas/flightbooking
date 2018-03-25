<?php
require_once ('db/connection.php');
$display = get_flights();
var_dump($display);
?>
<! DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>TP</title>
</head>
<body>
<header>
    <h1></h1>
</header>
<main>
    <a href="login.php">login</a>
    <a href="inscription.php">inscription</a>
    <a href="flights.php">flights</a>
</main>
</body>
</html>
