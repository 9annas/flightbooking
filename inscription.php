<?php
require_once ('db/connection.php');
$page_title = "Registration";
require_once ('views/page_top.php');
$en_post = $_SERVER['REQUEST_METHOD'] === 'POST'; //Indique si on est en réception
$validation = array(
    'firstname' => array(
        'is_valid' => false,
        'value' => null,
        'err_msg' => 'Firstname must have at least 2 characters.',
    ),
    'lastname' => array(
        'is_valid' => false,
        'value' => null,
        'err_msg' => 'Lastname must have at least 2 characters.',
    ),
    'email' => array(
        'is_valid' => false,
        'value' => null,
        'err_msg' => 'The email isn\'t valid.' ,
    ),
    'pwd' => array(
        'is_valid' => false,
        'value' => null,
        'err_msg' => 'Password must have at least 5 characters',
    ),
);

//Validation when in reception
if($en_post){
    //Champ firstname
    $validation['firstname']['value'] = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    //Minimum 2 caractères
    $validation['firstname']['is_valid'] = strlen($validation['firstname']['value']) >= 2;


    //lastname
    $validation['lastname']['value'] = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    //Minimum 2 caractères
    $validation['lastname']['is_valid'] = strlen($validation['lastname']['value']) >= 2;


    //email
    $validation['email']['value'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    //filter the characters in email
    $validation['email']['is_valid'] = (false !== filter_var($validation['email']['value'],  FILTER_VALIDATE_EMAIL));


    //Password
    $validation['pwd']['value'] = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
    //Minimum 5 characters
    $validation['pwd']['is_valid'] = strlen($validation['pwd']['value']) >= 5;




}
//var_dump($validation['pwd']['value']);
//var_dump($_POST);
//All form
$form_valide = $validation['firstname']['is_valid']
    && $validation['lastname']['is_valid']
    && $validation['email']['is_valid']
    && $validation['pwd']['is_valid'];
if($form_valide && check_mail($validation['email']['value'])=== true ){
    inscription($validation['lastname']['value'],$validation['firstname']['value'],$validation['email']['value'],$validation['pwd']['value']);
    //var_dump('You\'re good to go');
    //var_dump(get_users());
    //var_dump($validation['email']['value']);
    header('Location:index.php');
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="style/main.css">
</head>
<body class="bg2">

<main>
    <form method="post" id="register">
        <h2>Registration</h2>
        <fieldset>
            <legend>Please fill the form to register to our website</legend>
            <div>
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" id="firstname"  placeholder="Firstname"
                       class="<?= $en_post && !$validation['firstname']['is_valid'] ? 'invalide' : '' ?>"
                       value="<?= $en_post ? $validation['firstname']['value'] : '' ?>"/>
                <?php if($en_post && !$validation['firstname']['is_valid']){
                    echo '<span>' . $validation['firstname']['err_msg'] . '</span>';
                }

                ?>
            </div>
            <div>
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" id="lastname" placeholder="Lastname"
                       class="<?= $en_post && !$validation['lastname']['is_valid'] ? 'invalide' : '' ?>"
                       value="<?= $en_post ? $validation['lastname']['value'] : '' ?>"/>
                <?php if($en_post && !$validation['lastname']['is_valid']){
                    echo '<span>' . $validation['lastname']['err_msg'] . '</span>';
                }

                ?>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Courriel"
                       class="<?= $en_post && !$validation['email']['is_valid'] ? 'invalide' : '' ?>"
                       value="<?= $en_post ? $validation['email']['value'] : '' ?>"
                />

                <?php if($en_post && !$validation['email']['is_valid'] || ! check_mail($validation['email']['value'])){
                    echo '<span>' . $validation['email']['err_msg'] . '</span>';
                }
                ?>
            </div>
            <div>
                <label for="pwd">Password</label>
                <input type="password" name="pwd" id="pwd" placeholder="Password"
                       class="<?= $en_post && !$validation['pwd']['is_valid'] ? 'invalide' : '' ?>"
                       value="<?= $en_post ? $validation['pwd']['value'] : '' ?>"
                />
                <?php if($en_post && !$validation['pwd']['is_valid']){
                    echo '<span>' . $validation['pwd']['err_msg'] . '</span>';
                }
                ?>
            </div>
        </fieldset>
        <input type="submit" value="Submit">
    </form>
</main>

<?php
require_once ('views/page_bottom.php');
?>