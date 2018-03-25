<?php
// Connection
// Constantes rassemblant les infos de connexion et de schéma de la DB
define('HOST', '127.0.0.1');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'flightbooking');

$mysqli = new mysqli(HOST, USER, PASS, DBNAME);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

/**
 * Fournit tous les articles enregistrés dans la table article
 * Si un id de catégorie est fourni, fournit seulement les articles de cette catégorie
 * @param bool $cat_id
 * @return array
 */
//function get_article_list($cat_id=false) {
//    global $mysqli;
//// Sélectionner tous les articles (toutes les colonnes)
//    $queryStr = 'SELECT * FROM article';
//    // Si la catégorie est précisée, on ajoute une clause WHERE dans la requête
//    if (false !== $cat_id) {
//        $queryStr .= " WHERE `category_id` = " . $mysqli->real_escape_string($cat_id);
//    }
//// Execution de la requête (un select)
//    $res = $mysqli->query($queryStr);
//// Récupération des données
//    $resultat = array();
//    if ($res && ($res->num_rows > 0)) {
//        while ($article = $res->fetch_assoc()) {
//            $resultat[$article['id']] = $article;
//        };
//    };
//    return $resultat;
//}
function get_flights(){
    global $mysqli;
    $query = 'SELECT * FROM vol';
    $res = $mysqli->query($query);
    $resultat = array();
    while ($flights = $res->fetch_assoc()) {
        array_push($resultat,$flights);
    };
    return $resultat;
}
function get_users(){
    global $mysqli;
    $query = 'SELECT * FROM utilisateur';
    $res = $mysqli->query($query);
    $resultat = array();
    while ($users = $res->fetch_assoc()) {
        array_push($resultat,$users);
    };
    return $resultat;
}

function check_mail($usermail){
    $check = get_users();
    for($i = 0 ; $i < count($check);$i++){
        if ($check[$i]['mail'] == $usermail){
            return false;
        }
    }
    return true;
}

function check_login($username,$password){
    $check = get_users();
    for($i = 0 ; $i < count($check);$i++){
        if ($check[$i]['mail'] == $username){
            return true;
        }
    }
    return false;
}

function get_flight_id($myid){
    global $mysqli;
    $query = 'SELECT * FROM vol WHERE id = "'.$myid.'"';
    $res = $mysqli->query($query);
    $resultat = array();
    while ($flights = $res->fetch_assoc()) {
        array_push($resultat,$flights);
    };
    return $resultat;
}

function inscription($lastname,$firstname,$mail,$password){
    global $mysqli;
    var_dump($lastname,$firstname,$mail,$password);
    $query = 'INSERT INTO `utilisateur` (`nom`, `prenom`, `username`, `password`, `mail`) VALUES ("'.$lastname.'","'.$firstname.'","'.$mail.'","'.$password.'","'.$mail.'");';
    $res = $mysqli->query($query);
}

/**
 * Fournit un article de la table article à partir de son id
 * @param int $id
 * @return array
 */
//function get_article($id) {
//    global $mysqli;
//// Sélectionner tous les articles (toutes les colonnes)
//    $queryStr = 'SELECT * FROM article WHERE `id` = ' . $mysqli->real_escape_string($id);
//// Execution de la requête (un select)
//    $res = $mysqli->query($queryStr);
//// Récupération des données
//    $resultat = null;
//    if ($res && ($res->num_rows > 0)) {
//        while ($article = $res->fetch_assoc()) {
//            $resultat = $article;
//        };
//    };
//    return $resultat;
//}

/**
 * Fournit toutes les catégories de articles enregistrées dans la table article_category
 * @return array
 */
//function get_categories() {
//    global $mysqli;
//// Sélectionner toutes les categories (toutes les colonnes)
//    $queryStr = 'SELECT * FROM article_category';
//// Execution de la requête (un select)
//    $res = $mysqli->query($queryStr);
//// Récupération des données
//    $resultat = array();
//    if ($res && ($res->num_rows > 0)) {
//        while ($category = $res->fetch_assoc()) {
//            $resultat[$category['id']] = $category;
//        };
//    };
//    return $resultat;
//}

// Ajouter un enregistrement
/*$queryString = "INSERT INTO ma_table (nom,age) VALUES ('from php', 44)";
$res = $mysqli->query($queryString);
// Est-ce que la requète a bien marché ?
$resultat_insertion = false;
if ($res) {
    $resultat_insertion = $mysqli->insert_id;
};
var_dump($resultat_insertion);*/
