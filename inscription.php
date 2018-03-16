<?php
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
    'confirm' => array(
        'is_valid' => false,
        'value' => null,
        'err_msg' => 'The password doesn\'t match',
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
    $validation['age']['value'] = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
    //Minimum 5 characters
    $validation['pwd']['is_valid'] = strlen($validation['pwd']['value']) >= 5;


    //Password confirm
    $validation['age']['value'] = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
    //the passwords must be identical
    $validation['confirm']['is_valid'] = $validation['confirm']['value'] === $validation['pwd']['value'];


}



//All form
$form_valide = $validation['firstname']['is_valid']
    && $validation['lastname']['is_valid']
    && $validation['email']['is_valid']
    && $validation['pwd']['is_valid'];
if($form_valide){
    var_dump('You\'re good to go');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>P62 Formulaires : Réaffichage du select planetes</title>
    <style>
        #register{
            width: 50%;
            margin: auto;
        }

        #register div{
            margin: 5px;
        }

        #register div label{
            display: inline-block;
            width: 30%;
        }
    </style>
</head>
<body>
<header>

</header>
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

                <?php if($en_post && !$validation['email']['is_valid']){
                    echo '<span>' . $validation['email']['err_msg'] . '</span>';
                }

                ?>
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="email" placeholder="Password"
                       class="<?= $en_post && !$validation['pwd']['is_valid'] ? 'invalide' : '' ?>"
                       value="<?= $en_post ? $validation['pwd']['value'] : '' ?>"
                />

                <?php if($en_post && !$validation['pwd']['is_valid']){
                    echo '<span>' . $validation['pwd']['err_msg'] . '</span>';
                }

                ?>
            </div>

            <div>
                <label for="confirm">Confirm password</label>
                <input type="password" name="confirm" id="email" placeholder="Confirm your password"
                       class="<?= $en_post && !$validation['confirm']['is_valid'] ? 'invalide' : '' ?>"
                       value="<?= $en_post ? $validation['confirm']['value'] : '' ?>"
                />

                <?php if($en_post && !$validation['confirm']['is_valid']){
                    echo '<span>' . $validation['confirm']['err_msg'] . '</span>';
                }

                ?>
            </div>

        </fieldset>
        <input type="submit" value="Submit">
    </form>
</main>
</body>
</html>