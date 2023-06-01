<?php

// Récupération du Nom :
if (isset($_POST['nom_client']) && $_POST['nom_client'] != "") {
    $nom_client = $_POST['nom_client'];
}//  else {
//     $nom = Null;
// }

$adresse_client = (isset($_POST['adresse_client']) && $_POST['adresse_client'] != "") ? $_POST['adresse_client'] : Null;
$telephone_client = (isset($_POST['telephone_client']) && $_POST['telephone_client'] != "") ? $_POST['telephone_client'] : Null;
$email_client = (isset($_POST['email_client']) && $_POST['email_client'] != "") ? $_POST['email_client'] : Null;
$quantite = (isset($_POST['quantite']) && $_POST['quantite'] != "") ? $_POST['quantite'] : Null;
var_dump($quantite);
// if ($nom == Null || $adresse_client == Null || $quantite == Null || $telephone_client == Null || $email_client == Null) {
//     header("Location: commande.php");
//     exit;
// }

require "db_the_district.php";
$db = connexionBase();


try {
    $requete = $db->prepare("INSERT into commande (id_plat, quantite, total, date_commande, nom_client, telephone_client, email_client, adresse_client, etat) VALUES (:nom_client, :adresse_client, :telephone_client);");



    $requete->bindValue(":nom_client", $nom_client, PDO::PARAM_STR);
    $requete->bindValue(":adresse_client", $adresse_client, PDO::PARAM_STR);
    $requete->bindvalue(":telephone_client", $telephone_client, PDO::PARAM_INT);
    $requete->bindvalue(":email_client", $email_client, PDO::PARAM_STR);
    $requete->bindvalue(":quantite", $quantite, PDO::PARAM_STR);
    $requete->execute();

    $requete->closeCursor();
} catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_commande2.php)");
}

header("Location: accueil.php");

exit;

// if(isset($_POST['nom_client'])){
//     $nom_client= $_POST['nom_client'];
// }

// if(isset($_POST['telephone_client'])){
//     $telephone_client= $_POST['telephone_client'];
// }

// if(isset($_POST['email_client'])){
//     $email_client= $_POST['email_client'];
// }

// if(isset($_POST['telephone_client'])){
//     $telephone_client= $_POST['telephone_client'];
// }

// if(isset($_POST['quantite'])){
//     $quantite=$_POST['quantite'];
// }


// $id = $_REQUEST['commande'];
// $prix = $_POST['prix'];

// $total= $prix * $quantite;
// var_dump($total);
// var_dump($prix);
