<?php

//var_dump($_POST);

$nom   = (isset($_POST['nom']) && $_POST['nom'] != "") ? $_POST['nom'] : Null;
$email    = (isset($_POST['login']) && $_POST['login'] != "") ? $_POST['login']  : Null;
$mdp   = (isset($_POST['mdp']) && $_POST['mdp'] != "") ? $_POST['mdp'] : Null;


if ($nom == Null || $email == Null || $mdp == Null) {
    header("Location: inscription.php");
    exit;
}

$mdp = password_hash($mdp, PASSWORD_DEFAULT);

    require "db_the_district.php";
    $db = connexionBase();




try {
    $requete = $db->prepare("INSERT INTO utilisateur (nom_prenom, email, password) VALUES (:nom, :email, :mdp);");

    $requete->bindValue(":nom", $nom,   PDO::PARAM_STR);
    $requete->bindValue(":email", $email,     PDO::PARAM_STR);
    $requete->bindValue(":mdp", $mdp,   PDO::PARAM_STR);

    //var_dump($requete);

    $requete->execute();
    $requete->closeCursor();

} catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (inscriptions_script.php)");
}

header("Location: bienvenue.php");

exit();