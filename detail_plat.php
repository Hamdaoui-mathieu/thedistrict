<?php

include('header.php');
include('DAO.php');

//var_dump($_GET);
if (isset($_GET["id"])) {
    //var_dump($_GET["id"]);
    $id = $_GET["id"];
}


$tableau = detail($id);
//var_dump($tableau);


?>

<h1><strong>Details</strong></h1>

<?php foreach ($tableau as $categorie) :  ?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-6">

                <img src="/images_the_district/food/<?= $categorie->image ?>" class="rounded img-responsive ;" height="250px" width="250px"">
            </div>
            <div class="col-sm-6">
                <br>
                <div>
                    <p class="cadre"><strong><?= $categorie->libelle  ?></strong><br>
                    <p class="cadre"><strong><?= $categorie->description ?></strong><br>
                    <p class="cadre"><strong><?= $categorie->active  ?></strong><br>
                    <p class="cadre"><strong><?= $categorie->prix   ?></strong><br><br>
                    <form action="commande.php" method="POST"> 
                    <input type="hidden" name="commande" value="<?= $categorie->id   ?>" />
                    <input type="hidden" name="prix" value="<?=$categorie->prix ?>" />
                    <input type="submit" value="Ajouter au panier" />
                    
                    </form>
                                        
                </div>

            </div>
        </div>
    </div>

    <br>

<?php endforeach;
include('footer.php');
?>