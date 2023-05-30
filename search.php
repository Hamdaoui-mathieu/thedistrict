<?php
include_once ('header.php');
include_once 'DAO.php';

if (isset($_POST["search"])) {
    //var_dump($_POST["search"]);
    $search = $_POST["search"];
    // var_dump($_REQUEST);

}


$tableau_resultats = search_cat($search);
//$tableau_resultats2 = search_description($search);
//var_dump($tableau_resultats);
//var_dump($tableau_resultats2);

?>

<div class="container-fluid">
    <div class="row">
        <?php foreach ($tableau_resultats as $plat) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <a href="detail_plat.php?id=<?= $plat->id ?>">
                    <img src="images_the_district/food/<?= $plat->image ?>" class="rounded img-responsive ;" height="250px" width="250px">
                </a>
                <br>
                <br>
                <p class="cadre"><strong><?= $plat->libelle  ?></strong><br>

            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- <div class="container-fluid"> 
    <div class="row">
        <?php foreach ($tableau_resultats2 as $plat) :?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <a href="detail_plat.php?id=<?= $plat->id ?>">
                    <img src="images_the_district/food/<?= $plat->image ?>" class="rounded img-responsive ;" height="250px" width="250px">
                </a>
                <br>
                <br>
                <p class="cadre"><strong><?= $plat->libelle  ?></strong><br>

            </div>
        <?php endforeach; ?>
    </div>
</div>



<?php include('footer.php'); ?>
</div-->