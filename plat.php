<?php
include('header.php');
include('DAO.php');
$tableau = plat();
//var_dump($tableau);

?>
<div class="bg3">
    <h1 class="titre">Tout nos plats</h1>
</div>
<br>
<br>
<div class="container-fluid">

    <div class="row">
        <?php foreach ($tableau as $plat) : ?>


            <div class="col col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="detail_plat.php?id=<?= $plat->id ?>">
                    <img src="images_the_district/food/<?= $plat->image ?>"  class="rounded img-responsive ;" height="250px" width="250px">
                </a>
                <br>
                <br>
                <p class="cadre"><strong><?= $plat->libelle  ?></strong><br>
                <form action="commande.php" method="POST"> 
                    <input type="number" size="1">
                    <input type="submit" value="Ajouter au panier"></input>
                    </form>
                    <br>
                <br>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
<br>




</div>

<?php include('footer.php'); ?>
</div>