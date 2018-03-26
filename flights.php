<?php
require_once ('db/connection.php');
$display = get_flights();
//var_dump($display);
if($_POST)
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
        <ul>
            <?php for ($i = 0 ; $i < count($display) ; $i++){?>
            <li>
                <div id="flight">
                    <div class="prix">
                        <span> <?= $display[$i]['price']?>$</span>
                        <form method="post" name="selected_flight">
                            <input type="hidden" name="myflight" value="<?=$display[$i]['id']?>">
                            <input type="hidden" name="myflight" value="<?=$_POST['date_dep']?>">
                            <label for="number">Number of tickets: <?= $display[$i]['nb_place']?></label>
<!--                            <input id="number" name="number" type="number" min="1">-->
                            <input type="submit" value="SELECT"></>
                        </form>

                    </div>
                    <div class="details">
                        <img src="images/delta_logo.png" alt="image compagnie">

                        <div>
                            <span class="block">Departs :</span>
                            <strong><?= $display[$i]['dep_time']?></strong>
                            <span> <?=$_POST['date_dep']?> </span>
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
                            <span>Economy</span>
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