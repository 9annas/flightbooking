<?php
require_once ('db/connection.php');

if(!isset($_SESSION)){
    session_start();
}
var_dump($_POST);
if(!array_key_exists('pannier',$_SESSION)){
    $_SESSION['pannier'] = array();
}

if(array_key_exists('flight_date',$_POST) && array_key_exists('flight_id',$_POST)){
    $temp = array();
    array_push($temp , $_POST['flight_date'],$_POST['flight_id']);
    array_push($_SESSION['pannier'],$temp);
    var_dump($temp);

}

var_dump($_SESSION);
var_dump($_SESSION['pannier'][1][1]);
?>
<! DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/main.css">
    <title>flights</title>
</head>
<body>
<header>
    <form name="booked" method="post" action="flights.php">
<!--        <input type="hidden" name="date" value="--><?//= $_POST['flight_date'] ?><!--">-->
        <input type="hidden" name="monpannier" value="1">
        <input type="submit" value="return to booking">
    </form>
    <a href="index.php">back to index</a>
    <h1>Mon panier</h1>
</header>
<main>
    <ul>
        <?php
        for ($i = 0 ; $i < count($_SESSION['pannier']);$i++){
            for ($j = 1 ; $j < count($_SESSION['pannier'][$i]);$j++){
                $result = get_flight_id($_SESSION['pannier'][$i][1]); ?>
        <li>
            <div id="flight">
                <div class="prix">
                    <span> <?= $result[0]['price']?>$</span>
                    <form method="post" name="selected_flight" action="">
                        <input type="hidden" name="flight_id" value="<?=$result[0]['id']?>">
                        <input type="hidden" name="flight_date" value="<?= $_SESSION['pannier'][$i][0] ?>">
                        <label for="number">Number of tickets: <?= $result[0]['nb_place']?></label>
                        <!--                            <input id="number" name="number" type="number" min="1">-->
                        <input type="submit" value="DELETE"></>
                    </form>

                </div>
                <div class="details">
                    <img src="images/<?= $result[0]['comp_name'] ?>" alt="image compagnie">

                    <div>
                        <span class="block">Departs :</span>
                        <strong><?= $result[0]['dep_time']?></strong>
                        <span> <?=(array_key_exists('globaldate',$_SESSION))  ? $_SESSION['globaldate'] : 'hello'?> </span>
                        <span class="block"><?= $result[0]['ville_dep']?></span>
                    </div>

                    <div>
                        <span class="fa fa-chevron-right"></span>
                    </div>

                    <div>
                        <span class="block">Arrives :</span>
                        <strong>8:00 PM</strong>
                        <span class="block"><?= $result[0]['ville_arr']?></span>
                    </div>

                    <div>
                        <span><?php if ($result[0]['type_class'] == 1){ echo 'First Class';}elseif($result[0]['type_class'] == 2){echo 'Economy';}else{echo 'Business';} ?></span>
                    </div>

                </div>
            </div>
        </li>
            <?php }
        }
        ?>
    </ul>
</main>
</body>
</html>