<?php
 require_once 'vendor/autoload.php';
 header("Refresh:5; url=accueil.php", true, 303 ); 
 include_once("header.php");

?>
<h1>Merci, votre commande a bien été prise en compte.</h1>
<h1>Un mail de confirmation va être envoyé sur votre messagerie</h1>
<?php 


exit();
?>
