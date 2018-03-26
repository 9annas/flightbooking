<?php
require_once ('db/connection.php');
$display = get_flights();
//var_dump($display);
var_dump($_POST);

$today = date('d-m-Y');


define('ATTR_CHECKED',            'checked="checked"');
define('ATTR_SELECTED',           'selected="selected"');


//const for validation
define('SELECT_FROM', 'select_from');
define('SELECT_TO', 'select_to');
define('VAL_DATE', 'val_date');
define('VAL_CLASS', 'val_class');

//Informations of validation
define('K_IS_VALID',              'k_is_valid');
define('K_VALUE',                 'k_VALUE');
define('K_ERR_MSG',               'k_err_msg');

//var_dump(('28-12-12' > date('y-m-d') ? 'banane' : 'pomme'));




$vld = array(
       SELECT_FROM => array(
           K_IS_VALID => false,
           K_VALUE => null,
           K_ERR_MSG => 'Please select a city.'
       ),
       SELECT_TO => array(
           K_IS_VALID => false,
           K_VALUE => null,
           K_ERR_MSG => 'Please select a city.'
       ),
       /*VAL_DATE => array(
           K_IS_VALID => false,
           K_VALUE => null,
           K_ERR_MSG => 'Please select a valid date.'
       ),*/
       VAL_CLASS => array(
           K_IS_VALID => false,
           K_VALUE => null,
           K_ERR_MSG => 'Please select a class.'
       ),
);



//Are we in post?
$in_post = ('POST' === $_SERVER['REQUEST_METHOD']);

if($in_post){
    //Validate the inputs
    //SELECT_FROM : value must be different to -1
    $vld[SELECT_FROM][K_IS_VALID] = !filter_input(INPUT_POST, 'opt_city_from', FILTER_VALIDATE_FLOAT);

    //SELECT_TO: value must be different to -1
    $vld[SELECT_TO][K_IS_VALID] = !filter_input(INPUT_POST, 'opt_city_to', FILTER_VALIDATE_FLOAT);

    //VAL_DATE: input must be minimum from today
    //$vld[VAL_DATE][K_IS_VALID] = $vld[VAL_DATE][K_VALUE] >= $today;

    //VAL_CLASS: user must select one class
    $vld[VAL_CLASS][K_IS_VALID] = array_key_exists('class', $_POST);

    // Verify the whole form
    $form_valid = $vld[SELECT_FROM][K_IS_VALID]
        && $vld[SELECT_TO][K_IS_VALID]
        //&& $vld[VAL_DATE][K_IS_VALID]
        && $vld[VAL_CLASS][K_IS_VALID];
    if ($form_valid) {
        // Redirect user to flights.php when form is valid
        header('Location: flights.php');
        exit;
    }



    $date = DateTime::createFromFormat('Y-m-d', $_POST['date_dep']);


    //var_dump($_POST['date_dep']);
    //var_dump($_POST['class']);

    $vld[SELECT_FROM][K_VALUE] = $_POST['opt_city_to'];
    $vld[SELECT_TO][K_VALUE] = $_POST['opt_city_to'];
    //$vld[VAL_DATE][K_VALUE] =$date->format('d-m-Y'); //Contains an error
    $vld[VAL_CLASS][K_VALUE] = $_POST['class'];

    var_dump($vld[VAL_CLASS][K_VALUE]);
}


?>
<! DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>TP</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style/main.css">
    <script src="script/jquery-3.3.1.min.js"></script>
</head>
<body class="bg">
<header>
    <img src="images/kappaflight.png" alt="company logo">
    <nav>
        <a href="login.php">login</a>
        <a href="inscription.php">inscription</a>
        <a href="flights.php">flights</a>
    </nav>

</header>
<main>
    <h1>Get your tickets today!</h1>
    <a href="<?= $_SERVER['PHP_SELF'] ?>">retour au GET</a>
    <form method="post" id="formIndex" action="flights.php">
        <fieldset>
            <div class="inline <?= $in_post && ! $vld[SELECT_FROM][K_IS_VALID] ? 'invalid' : '' ?>">
                <?php
                if ($in_post && ! $vld[SELECT_FROM][K_IS_VALID] ) {
                    echo '<p>', $vld[SELECT_FROM][K_ERR_MSG] ,'</p>';
                }
                ?>
                <label for="opt_city_from">From:</label>
                <select name="opt_city_from" id="opt_city_from">
                    <option value="-1" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='-1' ? ATTR_SELECTED : '' ?>>select city...</option>
                    <option value="Montreal" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='Montreal' ? ATTR_SELECTED : '' ?>>Montreal</option>
                    <option value="New York" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='New York' ? ATTR_SELECTED : '' ?>>New York</option>
                    <option value="Paris" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='Paris' ? ATTR_SELECTED : '' ?>>Paris</option>
                    <option value="Tokyo" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='Tokyo' ? ATTR_SELECTED : '' ?>>Tokyo</option>
                    <option value="Johannesburg" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='Johannesburg' ? ATTR_SELECTED : '' ?>>Johannesburg</option>
                    <option value="Casablanca" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='Casablanca' ? ATTR_SELECTED : '' ?>>Casablanca</option>
                    <option value="Marrakech" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='Marrakech' ? ATTR_SELECTED : '' ?>>Marrakech</option>
                    <option value="Vancouver" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='Vancouver' ? ATTR_SELECTED : '' ?>>Vancouver</option>
                </select>
            </div>

            <div class="inline <?= $in_post && ! $vld[SELECT_TO][K_IS_VALID] ? 'invalid' : '' ?>">
                <?php
                if ($in_post && ! $vld[SELECT_TO][K_IS_VALID] ) {
                    echo '<p>', $vld[SELECT_TO][K_ERR_MSG] ,'</p>';
                }
                ?>
                <label for="opt_city_to">To:</label>
                <select name="opt_city_to" id="opt_city_to">
                    <option value="-1" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='-1' ? ATTR_SELECTED : '' ?>>select city...</option>
                    <option value="Montreal" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='Montreal' ? ATTR_SELECTED : '' ?>>Montreal</option>
                    <option value="New York" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='New York' ? ATTR_SELECTED : '' ?>>New York</option>
                    <option value="Paris" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='Paris' ? ATTR_SELECTED : '' ?>>Paris</option>
                    <option value="Tokyo" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='Tokyo' ? ATTR_SELECTED : '' ?>>Tokyo</option>
                    <option value="Johannesburg" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='Johannesburg' ? ATTR_SELECTED : '' ?>>Johannesburg</option>
                    <option value="Casablanca" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='Casablanca' ? ATTR_SELECTED : '' ?>>Casablanca</option>
                    <option value="Marrakech" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='Marrakech' ? ATTR_SELECTED : '' ?>>Marrakech</option>
                    <option value="Vancouver" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='Vancouver' ? ATTR_SELECTED : '' ?>>Vencouver</option>
                </select>
            </div>


            <div>
                <?php
                /*if ($in_post && ! $vld[VAL_DATE][K_IS_VALID] ) {
                    echo '<p>', $vld[VAL_DATE][K_ERR_MSG] ,'</p>';
                }*/
                ?>
                <label for="date_dep">Select departure date: </label>
                <input type="date" name="date_dep" id="date_dep" value="<?= array_key_exists('date_dep', $_POST) && $_POST['date_dep'] !== '' ? $vld[VAL_DATE][K_VALUE] : '' ?>"
                min="<?= $today ?>">
            </div>

            <div class="divRadio <?= $in_post && ! $vld[VAL_CLASS][K_IS_VALID] ? 'invalid' : '' ?>">
                <?php
                if ($in_post && ! $vld[VAL_CLASS][K_IS_VALID] ) {
                    echo '<p>', $vld[VAL_CLASS][K_ERR_MSG] ,'</p>';
                }
                ?>
                <span class="block">Class:</span>
                <div class="inline">
                    <input class="w3-radio" type="radio" id="economy" name="class" value="2" <?= array_key_exists('class', $_POST) && $_POST['class'] === 'economy' ? ATTR_CHECKED : '' ?>>
                    <label for="economy">Economy</label>
                </div>
                <div class="inline">
                    <input class="w3-radio" type="radio" id="firstClass" name="class" value="1" <?= array_key_exists('class', $_POST) && $_POST['class'] === 'firstClass' ? ATTR_CHECKED : '' ?>>
                    <label for="firstClass">First Class</label>
                </div>
                <div class="inline">
                    <input class="w3-radio" type="radio" id="business" name="class" value="3" <?= array_key_exists('class', $_POST) && $_POST['class'] === 'business' ? ATTR_CHECKED : '' ?>>
                    <label for="business">Business</label>
                </div>
            </div>
        </fieldset>
        <input class="button" type="submit" value="Submit">
    </form>
</main>
</body>
</html>
