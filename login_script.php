<?php

session_start();
include("DAO.php");

if (!isset($_POST['login'], $_POST['mdp'])){
    exit('Vous devez entrer votre email et votre mot de passe!');
}else{
    $email = $_POST['login'];
    $password = $_POST['mdp'];
}

$user = utilisateur($email);

if($user){//si l'utilisateur existe
 
    //TODO: utiliser password_hash() à l'inscription et password_verify avant le login

    if( password_verify($password, $user["password"])
        /*$password===$user["password"]*/){
        //$_SESSION['auth'] = $user;
        
        $_SESSION['flash']['success'] = "Bonjour " .$user["nom_prenom"]. ". Vous êtes maintenant connecté";
    
        header('location: accueil.php');
    exit();
    }
    else{$_SESSION['flash']['danger'] = 'Les données envoyées sont invalides';

        header('Location: connexion.php');

    }
}
$_SESSION['flash']['danger'] = 'Les données envoyées sont invalides';
header('Location: connexion.php');
