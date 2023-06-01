<?php
include('header.php');
include_once('DAO.php');


if (isset($_POST["commande"])) {
    //var_dump($_POST["commande"]);
    $id = $_POST["commande"];
}
$tableau = detail($id);
//var_dump($tableau);
?>
<div class="container-fluid">
    <div class="row">
        <?php foreach ($tableau as $plat) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">

                    <img src="images_the_district/food/<?= $plat->image ?>" class="rounded img-responsive ;" height="250px" width="250px">
                <br>
                <br>
                <p class="cadre"><strong><?= $plat->libelle  ?></strong><br>
                <p class="cadre"><strong><?= $plat->prix  ?></strong><br>
               
                    <br>
                <br>
            </div>
        <?php endforeach; ?>
    </div>
</div>


            <form action="script_commande.php" method="post">
            <input type="hidden" name="commande" value="<?= $plat->id   ?>" />
                    <input type="hidden" name="prix" value="<?=$plat->prix ?>" />
                    <input type="hidden" name="libelle" value="<?=$plat->libelle ?>" />
            <input name ="quantite" type="number" size="1" value="1">

            <p>* Ces zones sont obligatoires</p>
                   
                <fieldset>
                    <legend>Vos coordonnées</legend>
                    <label>Votre nom*:</label><input name="nom" type="text"><span id="erreur_nom"></span>
                    <br><br>
                    <label>Votre prénom*</label><input name="prenom" type="text">
                    <br><br>
                    <label>Code postal*:</label><input name="cp" type="text">
                    <br><br>
                    <label>Adresse:</label><input name="adresse" type="text">
                    <br><br>
                    <label>Ville:</label><input name="ville" type="text">
                    <br><br>
                    <label>Numéro de téléphone*:</label><input name="num" type="text">
                    <br><br>
                    <label>Email*:</label><input name="email" type="text" placeholder="nom.prénom@1234.fr">
                </fieldset>
                <input type="submit"  onclick="return confirm('Voulez-vous valider cette commande?');" value="Commander">

                <br> <br> <br> <br> <br> <br> <br> 

<?php

include('footer.php');
?>