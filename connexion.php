<?php
session_start();
include("header.php");



if(isset($_SESSION['flash']['danger'])) {
    $message = $_SESSION['flash']['danger'];
    unset($_SESSION['flash']['danger']);
?>
   <div class="alert alert-danger" role="alert">
        <?php echo $message; ?>
    </div>
<?php 
}
?>


<div class="bg3">
    <h1 class="titre">Connexion utilisateur</h1>
</div>
<div class="float-right">
<p >Pas encore de compte? C'est <a class="text-success" href="inscription.php">par ici!!</a></p>
</div>

<br>
<br>
<form action="login_script.php" method="POST" class="margin">

    <label for="login_email" ><strong>Identifiant (adresse mail)</strong></label>
    <br>
    <input type="email" placeholder="Entrer le nom d'utilisateur" name="login" required/>
    <br>
    <br>
    <label for="login_password" class="lb"><b>Mot de passe</b></label>
    <br>
    <input type="password" placeholder="Entrez votre mot de passe" name="mdp" required/>
    <br>
    <br>
    <label>
        <input type="hidden" name="remember" value="0"/>
        <input type="checkbox" name="remember" value="1"/>Se souvenir de moi</label>
    <br>
    <br>
    <input type="submit" id="submit" value='Connexion'>
    <?php
    if (isset($_GET['erreur'])) {
        $err = $_GET['erreur'];
        if ($err == 1 || $err == 2)
            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
    }
    ?>
</form>
<br>

<br>


<?php
include("footer.php");
?>