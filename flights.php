<?php
require_once ('db/connection.php');
$display = get_flights();
var_dump($display);
?>
<! DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
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
</main>
</body>
</html>