<?php
require_once ('db/connection.php');
$display = get_flights();
//var_dump($display);
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
        <li><div>
                <?php
                for($i = 0 ; $i < count($display);$i++){
                    echo '<li><div>'.$display[$i]['num_vol'].$display[$i]['nb_place_eco'].$display[$i]['nb_place_first'].$display[$i]['ville_dep'].$display[$i]['ville_arr'].$display[$i]['ville_arr'].$display[$i]['vol_duration'].$display[$i]['comp_name'].'</div></li>';
                }
                ?>
            </div></li>
    </ul>

        <ul>
            <li>
                <div id="flight">
                    <div class="prix">
                        <span>999.99$</span>
                        <form method="post">
                            <label for="number">Number of tickets: </label>
                            <input id="number" name="number" type="number" min="1">
                            <input type="submit" value="SELECT"></>
                        </form>

                    </div>
                    <div class="details">
                        <img src="images/delta_logo.png" alt="image compagnie">

                        <div>
                            <span class="block">Departs :</span>
                            <strong>11:00 AM</strong>
                            <span> Fri Mar 23</span>
                            <span class="block">Montréal</span>
                        </div>

                        <div>
                            <span class="fa fa-chevron-right"></span>
                        </div>

                        <div>
                            <span class="block">Arrives :</span>
                            <strong>8:00 PM</strong>
                            <span> Sun Aug 20</span>
                            <span class="block">Dubai</span>
                        </div>

                        <div>
                            <span>Economy</span>
                        </div>

                    </div>

                </div>
            </li>
        </ul>


    </div>
</main>
</body>
</html>