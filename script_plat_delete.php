<?php

require "db_the_district.php";
$db = connexionBase();

try {

    $requete = $db->prepare("DELETE FROM plat WHERE id = ?");
    $requete->execute(array($_GET["id"]));
    $requete->execute();
    $requete->closeCursor();
} catch (Exception $e) {
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_plat_delete.php)");
}


TrtRedirection:
header("Location: plat_delete.php");
exit;