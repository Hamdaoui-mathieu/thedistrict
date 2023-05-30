<?php

require_once("header.php");
include_once ("db_the_district.php");

//on valide toutes les données avant dans une fonction valider_donnees() qui prend en paramètres les données une par une
// function valider_donnees($donnees){
//     $data = trim($donnees);
//     $data = stripcslashes($donnees);
//     $data = strip_tags($donnees);
  
//     return $data;
//   }

//   if (isset($_REQUEST['nom'], $_REQUEST['login'], $_REQUEST['mdp'])){
//     // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
//     $username = valider_donnees($_POST['nom']);
//     $email = valider_donnees($_POST['login']);
//     if(filter_var($email, FILTER_VALIDATE_EMAIL)){
//       $email = $email;
//     }else{
//       $email=null;
//     }
    
//     $password = valider_donnees($_POST['mdp']);
//     $pass = password_hash($password, PASSWORD_DEFAULT);
  
//       $res = creerUtilisateur($username, $email, $pass);
//       if($res == "OK"){
//          echo "<div class='sucess'>
//                   <h3>Votre inscription est bien prise en compte</h3>
//                   <p>Cliquez ici pour vous <a href='login_form.php'>connecter</a></p>
//               </div>";
//       }
//   }else{
?>



<br>
<div class="bg3">
    <h1 class="titre">Inscription utilisateur</h1>
</div>


<br>
<br>
<form action="inscriptions_script.php" method="post">

    <label><strong>Nom et Prénom</strong></label>
    <input type="text" name="nom" required>
    <br>
    <br>
    <label class="lb"><strong>adresse mail</strong></label>
    <input type="text" name="login" required>
    <br>
    <br>

    <label class="lb"><b>Mot de passe</b></label>
    <input type="password" placeholder="Entrez votre mot de passe" name="mdp" required>
    <br>
    <br>

    <input type="submit" id="submit" value='Inscription'>
    <br>
    <br>
    <br>
</form>



<?php
include("footer.php");
?>