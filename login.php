<?php
define('SESS_USERNAME', 'SESS_USERNAME');
//Activer la session
if(PHP_SESSION_NONE === session_status()){
    session_start();

}


var_dump($_SESSION);

//L'utilisateur est connecté si il a un username dans sa session

function user_is_logged(){
    return $is_logged = array_key_exists(SESS_USERNAME, $_SESSION);

}


//Réception des données POST
var_dump($_POST);
if(! user_is_logged() && array_key_exists('username', $_POST) && array_key_exists('password', $_POST) && array_key_exists('login_submit', $_POST)){
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    //Authentification
    /*require_once dirname(__FILE__) . '/authenticate.php';
    if(authenticate($username, $password)){
        $_SESSION[SESS_USERNAME] = $username;
    }
*/

}elseif (user_is_logged() && array_key_exists('logout_submit', $_POST)){
    unset($_SESSION[SESS_USERNAME]);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
</head>
<body>
<div id="wrapper">
    <header>
        <h1>Login</h1>
        <div>
            <?php if( ! user_is_logged()){ ?>
                <form method="post" name="login">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                    <input name="login_submit" type="submit" value="Se connecter">
                </form>
            <?php }else{ //Il est connecté ?>
                <form method="post" name="logout">
                    <input type="submit" name="logout_submit" value="Se déconnecter">
                </form>

            <?php } ?>
        </div>

    </header>


</div>
</body>
</html>