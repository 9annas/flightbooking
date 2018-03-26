<?php
require_once ('db/connection.php');
if(!isset($_SESSION)){
    session_start();
}
$display=get_flights();
//var_dump($display);
$mydate = date("Y-m-d");
if (!array_key_exists("monpannier",$_POST)){
    if (!array_key_exists("classes",$_POST)){
        if(!array_key_exists("date_dep",$_POST) || !array_key_exists("class",$_POST) || $_POST['opt_city_from']==-1 || $_POST['opt_city_to']==-1 || strtotime($_POST["date_dep"]) < strtotime($mydate)){
            header('Location:index.php');
        }else{
            $display = research_filter($_POST['opt_city_from'],$_POST['opt_city_to'],$_POST['class']);
        }
    }else{
        if ($_POST['classes'] == 5){
            $display=get_flights();
        }else{
            $display = flights_by_class($_POST['classes']);
        }
    }

}



//var_dump($display);
//var_dump($mydate);
// || $_POST["date_dep"] < $mydate
var_dump($_POST);
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
    <h1></h1>
</header>
<main>
    <h1 style="text-align: center ; font-size: 5em"   class="myh1"><?= (count($display)==0)? "No Flight available" : "" ?></h1>
        <ul>
            <form name="myclassdisplayed" method="post">
                <input type="radio" name="classes" id="all"   value="5"> <label for="all">all types</label>
                <input type="radio" name="classes" id="eco"   value="2"> <label for="eco">all econnomy</label>
                <input type="radio" name="classes" id="first" value="1"> <label for="first">all first class</label>
                <input type="radio" name="classes" id="business" value="3"> <label for="business">all business</label>
                <input type="submit" value="Show">
            </form>
            <?php for ($i = 0 ; $i < count($display) ; $i++){?>
            <li>
                <div id="flight">
                    <div class="prix">
                        <span> <?= $display[$i]['price']?>$</span>
                        <form method="post" name="selected_flight" action="flightbooking.php">
                            <input type="hidden" name="flight_id" value="<?=$display[$i]['id']?>">
                            <input type="hidden" name="flight_date" value="<?= (array_key_exists('date_dep', $_POST)) ? $_POST["date_dep"] : "" ?>">
                            <label for="number">Number of tickets: <?= $display[$i]['nb_place']?></label>
<!--                            <input id="number" name="number" type="number" min="1">-->
                            <input type="submit" value="SELECT"></>
                        </form>

                    </div>
                    <div class="details">
                        <img src="images/<?= $display[$i]['comp_name'] ?>" alt="image compagnie">

                        <div>
                            <span class="block">Departs :</span>
                            <strong><?= $display[$i]['dep_time']?></strong>
                            <span> <?=(array_key_exists('date_dep',$_POST)) ? $_POST["date_dep"] : ""?> </span>
                            <span class="block"><?= $display[$i]['ville_dep']?></span>
                        </div>

                        <div>
                            <span class="fa fa-chevron-right"></span>
                        </div>

                        <div>
                            <span class="block">Arrives :</span>
                            <strong>8:00 PM</strong>
                            <span class="block"><?= $display[$i]['ville_arr']?></span>
                        </div>

                        <div>
                            <span><?php if ($display[$i]['type_class'] == 1){ echo 'First Class';}elseif($display[$i]['type_class'] == 2){echo 'Economy';}else{echo 'Business';} ?></span>
                        </div>

                    </div>

                </div>
            </li>
            <?php } ?>
        </ul>
        <aside>
            <div id="side">
                <div class="myarticles">
                    <img src="" alt="">
                </div>
            </div>
        </aside>
    </div>
</main>
</body>
</html>