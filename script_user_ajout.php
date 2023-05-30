<?php
// Récupération du Nom :
if (isset($_POST['nom']) && $_POST['nom'] != "") {
    $nom = $_POST['nom'];
} else {
    $nom = Null;
}

$login = (isset($_POST['login']) && $_POST['login'] != "") ? $_POST['login'] : Null;
$mdp = (isset($_POST['mdp']) && $_POST['mdp'] != "") ? $_POST['mdp'] : Null;

if ($nom == Null || $login == Null || $mdp == Null) {
    header("Location: inscription.php");
    exit;
}

require "db_the_district.php";
$db = connexionBase();


try {
    $requete = $db->prepare("INSERT INTO utilisateur (nom_prenom, email, password) VALUES (:nom, :login, :mdp);");



    $requete->bindValue(":nom", $nom, PDO::PARAM_STR);
    $requete->bindValue(":login", $login, PDO::PARAM_STR);
    $requete->bindvalue("mdp", $mdp, PDO::PARAM_STR);
    $requete->execute();

    $requete->closeCursor();
} catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_user_ajout.php)");
}

header("Location: accueil.php");

exit;
