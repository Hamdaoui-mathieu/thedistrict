<?php

function connexionBase()
{
    $db = "the_district";
    $dbhost = "localhost";
    $dbuser = "admin3";
    $dbpassword = "afpa1234";
    $charset = "utf8";

    try {
        $connexion = new PDO('mysql:host=' . $dbhost . ';dbname=' . $db . '; charset=utf8' . '', $dbuser, $dbpassword);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
    }
}
