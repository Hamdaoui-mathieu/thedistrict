<?php

function wrap(){

$db = connexionBase();

$requete = $db->query("SELECT * FROM plat where id_categorie like '%9%'");

$wrap = $requete->fetchAll(PDO::FETCH_OBJ);

$requete->closeCursor();
}

function pasta(){

$db = connexionBase();

$requete = $db->query("SELECT * FROM plat where id_categorie like '%10%'");

$tableau = $requete->fetchAll(PDO::FETCH_OBJ);

$requete->closeCursor();
}
?>
