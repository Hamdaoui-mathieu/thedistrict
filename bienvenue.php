<?php
session_start();
include("header.php");

if(isset($_SESSION['flash']['success'])) {
    $message = $_SESSION['flash']['success'];
    unset($_SESSION['flash']['success']);
?>
   <div class="alert alert-success" role="alert">
        <?php echo $message; ?>
    </div>
<?php 
}
?>

<h1>BIENVENUE!!</h1>
<br>
<br>
<p><strong>Votre inscription a bien été prise en compte.</strong></p>
<a href="accueil.php"><button>Retour sur notre site pour votre première commande.</button></a>
</h1>

<?php
include("footer.php");
?>