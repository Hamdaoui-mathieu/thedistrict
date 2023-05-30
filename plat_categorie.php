<?php
include('header.php');
include('DAO.php');

// var_dump($_GET);
if (isset($_GET["id_categorie"])) {
    //var_dump($_GET["id_categorie"]);
    $id_categorie = $_GET["id_categorie"];
}


$tableau = id($id_categorie);
$tableau2 = plat_populaire();
//var_dump($tableau);

?>
<div class="bg3">
 
    <h1 class="titre">Laissez-vous tenter!</h1>
    
</div>




<br><br>

<div class="container-fluid">
    <div class="row">
        <?php foreach ($tableau as $plat) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <a href="detail_plat.php?id=<?= $plat->id ?>">
                    <img src="images_the_district/food/<?= $plat->image ?>" class="rounded img-responsive ;" height="250px" width="250px">
                </a>
                <br>
                <br>
                <p class="cadre"><strong><?= $plat->libelle  ?></strong><br>
                <form action="commande.php" method="POST">
                    <input type="hidden" name="commande" value="<?= $plat->id   ?>" />
                    <input type="submit" value="Ajouter au panier"></input>
                    </form>
                    <br>
                <br>
            </div>
        <?php endforeach; ?>
    </div>
</div>




<?php include('footer.php'); ?>
</div>