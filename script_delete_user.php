<?php
require "db_the_district.php";
$db = connexionBase();

try {
    // Construction de la requête DELETE sans injection SQL :
    $requete = $db->prepare("DELETE FROM utilisateur WHERE id = ?");
    $requete->execute(array($_GET["id"]));
    $requete->execute();
    $requete->closeCursor();
} catch (Exception $e) {
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_delete_user.php)");
}

TrtRedirection:
header("Location: pageAdministrateur.php");
exit;