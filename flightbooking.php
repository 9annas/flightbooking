<?php
var_dump($_POST);
if(!isset($_SESSION)){
    session_start();
}
if(!array_key_exists('pannier',$_SESSION)){
    $_SESSION['pannier'] = array();
}
array_push($_SESSION['pannier'],$_POST['flight_date'],$_POST['flight_id']);


var_dump($_SESSION);
?>
<! DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>flights</title>
</head>
<body>
<header>
    <form name="booked" method="post" action="flights.php">
        <input type="hidden" name="monpannier" value="1">
        <input type="submit" value="return to booking">
    </form>
    <a href="index.php">back to index</a>

    <h1></h1>
</header>
<main>
</main>
</body>
</html>