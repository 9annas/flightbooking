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

var_dump(('28-12-12' > date('y-m-d') ? 'banane' : 'pomme'));




$vld = array(
       SELECT_FROM => array(
           K_IS_VALID => false,
           K_VALUE => null,
           K_ERR_MSG => 'Please select a city'
       ),
       SELECT_TO => array(
           K_IS_VALID => false,
           K_VALUE => null,
           K_ERR_MSG => 'Please select a city'
       ),
       VAL_DATE => array(
           K_IS_VALID => false,
           K_VALUE => null,
           K_ERR_MSG => 'Please select a date of departure'
       ),
       VAL_CLASS => array(
           K_IS_VALID => false,
           K_VALUE => null,
           K_ERR_MSG => 'Please select a class'
       ),
);

$vld[VAL_DATE][K_VALUE] = $_POST['date_dep'];

//Are we in post?
$in_post = ('POST' === $_SERVER['REQUEST_METHOD']);

if($in_post){
    //Validate the inputs
    //SELECT_FROM : value must be different to -1
    $vld[SELECT_FROM][K_IS_VALID] = !filter_input(INPUT_POST, SELECT_FROM, FILTER_VALIDATE_FLOAT);

    //SELECT_TO: value must be different to -1
    $vld[SELECT_TO][K_IS_VALID] = !filter_input(INPUT_POST, SELECT_TO, FILTER_VALIDATE_FLOAT);

    //VAL_DATE: input must be minimum from today
    $vld[VAL_DATE][K_IS_VALID] = $vld[VAL_DATE][K_VALUE] >= $today;

    //VAL_CLASS: user must select one class
    $vld[VAL_CLASS][K_IS_VALID] = array_key_exists(VAL_CLASS, $_POST);

    // Verify the whole form
    $form_valid = $vld[SELECT_FROM][K_IS_VALID]
        && $vld[SELECT_TO][K_IS_VALID]
        && $vld[VAL_DATE][K_IS_VALID]
        && $vld[VAL_CLASS][K_IS_VALID];
    if ($form_valid) {
        // Redirect user to flights.php when form is valid
        header('Location: flights.php');
        exit;
    }




}
var_dump($_POST['date_dep']);

?>
<! DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>TP</title>
</head>
<body>
<header>
    <h1>flightbooking</h1>
    <a href="login.php">login</a>
    <a href="inscription.php">inscription</a>
    <a href="flights.php">flights</a>
</header>
<main>
    <form method="post">
        <fieldset>
            <legend>Flights</legend>
            <div class="<?= $in_post && ! $vld[SELECT_FROM][K_IS_VALID] ? 'invalid' : '' ?>">
                <label for="opt_city_from">From:</label>
                <select name="opt_city_from" id="opt_city_from">
                    <option value="-1" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='-1' ? ATTR_SELECTED : '' ?>>select city...</option>
                    <option value="montreal" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='montreal' ? ATTR_SELECTED : '' ?>>Montreal</option>
                    <option value="ny" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='ny' ? ATTR_SELECTED : '' ?>>New York</option>
                    <option value="paris" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='paris' ? ATTR_SELECTED : '' ?>>Paris</option>
                    <option value="tokyo" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='tokyo' ? ATTR_SELECTED : '' ?>>Tokyo</option>
                    <option value="jb" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='jb' ? ATTR_SELECTED : '' ?>>Johannesburg</option>
                    <option value="casa" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='casa' ? ATTR_SELECTED : '' ?>>Casablanca</option>
                    <option value="marra" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='marra' ? ATTR_SELECTED : '' ?>>Marrakech</option>
                    <option value="venc" <?= array_key_exists('opt_city_from', $_POST) && $_POST['opt_city_from'] ==='venc' ? ATTR_SELECTED : '' ?>>Vencouver</option>
                </select>
            </div>

            <div class="<?= $in_post && ! $vld[SELECT_TO][K_IS_VALID] ? 'invalid' : '' ?>">
                <label for="opt_city_to">To:</label>
                <select name="opt_city_to" id="opt_city_to">
                    <option value="-1" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='-1' ? ATTR_SELECTED : '' ?>>select city...</option>
                    <option value="montreal" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='montreal' ? ATTR_SELECTED : '' ?>>Montreal</option>
                    <option value="ny" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='ny' ? ATTR_SELECTED : '' ?>>New York</option>
                    <option value="paris" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='paris' ? ATTR_SELECTED : '' ?>>Paris</option>
                    <option value="tokyo" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='tokyo' ? ATTR_SELECTED : '' ?>>Tokyo</option>
                    <option value="jb" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='jb' ? ATTR_SELECTED : '' ?>>Johannesburg</option>
                    <option value="casa" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='casa' ? ATTR_SELECTED : '' ?>>Casablanca</option>
                    <option value="marra" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='marra' ? ATTR_SELECTED : '' ?>>Marrakech</option>
                    <option value="venc" <?= array_key_exists('opt_city_to', $_POST) && $_POST['opt_city_to'] ==='venc' ? ATTR_SELECTED : '' ?>>Vencouver</option>
                </select>
            </div>

            <div class="<?= $in_post && ! $vld[VAL_DATE][K_IS_VALID] ? 'invalid' : '' ?>">
                <label for="date_dep">Select departure date</label>
                <input type="date" name="date_dep" id="date_dep" value="<?= array_key_exists('date_dep', $_POST) && $_POST['date_dep'] !== '' ? $_POST['date_dep'] : '' ?>"
                min="<?= $today ?>">
            </div>

            <div class="<?= $in_post && ! $vld[VAL_CLASS][K_IS_VALID] ? 'invalid' : '' ?>">
                <span>Class:</span>
                <div>
                    <label for="economy">Economy</label>
                    <input type="radio" id="economy" name="class" value="economy" <?= array_key_exists('class', $_POST) && $_POST['class'] === 'economy' ? ATTR_CHECKED : '' ?>>
                </div>
                <div>
                    <label for="firstClass">First Class</label>
                    <input type="radio" id="firstClass" name="class" value="firstClass" <?= array_key_exists('class', $_POST) && $_POST['class'] === 'firstClass' ? ATTR_CHECKED : '' ?>>
                </div>
                <div>
                    <label for="business">Business</label>
                    <input type="radio" id="business" name="class" value="business" <?= array_key_exists('class', $_POST) && $_POST['class'] === 'business' ? ATTR_CHECKED : '' ?>>
                </div>
            </div>
        </fieldset>
        <input type="submit" value="Submit">
    </form>
</main>
</body>
</html>
