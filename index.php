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
<!--    <form action="flights.php" method="post" name="flightfilter">-->
<!--        <label for="departure">FROM</label>-->
<!--        <select name="departure">-->
<!--            <option value="volvo">Volvo XC90</option>-->
<!--            <option value="saab">Saab 95</option>-->
<!--            <option value="mercedes">Mercedes SLK</option>-->
<!--            <option value="audi">Audi TT</option>-->
<!--        </select><br>-->
<!--        <label for="arrival">TO</label>-->
<!--        <select name="arrival">-->
<!--            <option value="volvo">Volvo XC90</option>-->
<!--            <option value="saab">Saab 95</option>-->
<!--            <option value="mercedes">Mercedes SLK</option>-->
<!--            <option value="audi">Audi TT</option>-->
<!--        </select><br>-->
<!--    </form>-->
</main>
</body>
</html>
