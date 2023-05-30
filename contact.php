<?php
include('header.php');
?>


<div class="bg4">
    <h1 class="titre">Nous contactez</h1>
</div>

<br>
<p>* Ces zones sont obligatoires</p>
<form action="" method="post">
    <fieldset>
        <legend>Vos coordonnées</legend>
        <div class="row">
            <div class="col-5">
                <label>Votre nom*:</label><input name="nom" type="text"><span id="erreur_nom"></span>
                <br><br>
                <label>Votre prénom*</label><input name="prenom" type="text">
                <br><br>
                <label>Code postal*:</label><input name="code postal" type="text">
                <br><br>
                <label>Adresse:</label><input name="adresse" type="text">
                <br>
            </div>
            <div class="col-5">
                <label>Ville:</label><input name="ville" type="text">
                <br><br>
                <label>Numéro de téléphone*:</label><input name="num" type="text">
                <br><br>
                <label>Email*:</label><input name="email" type="text" placeholder="nom.prénom@1234.fr">
                <br><br>
                <label>Commentaires:</label><textarea></textarea>
            </div>
            <div class="col-2">
                <input type="submit" value="Envoyer" class="float-right">
            </div>
        </div>
    </fieldset>
</form>
<br>

<?php

include('footer.php');
?>