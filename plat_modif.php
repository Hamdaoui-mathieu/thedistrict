<?php
include('headerAdmin.php');
include('DAO.php');
$tableau = plat();
//var_dump($tableau);

?>
<div class="bg3">
    <h1 class="titre">Tous nos plats</h1>
</div>
<br>
<br>
<div class="container-fluid">

    <div class="row">
        <?php foreach ($tableau as $plat) : ?>


            <div class="col col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <form action="plat_form.php?id=<?= $plat->id ?>" method='POST'>
            <button type="submit" class='btn'>
                    <img src="images_the_district/food/<?= $plat->image ?>"  class="rounded img-responsive ;" height="250px" width="250px">
                <br>
                <br>
                <p class="cadre"><strong><?= $plat->libelle  ?></strong><br>
                    <input type="hidden" value="<?= $plat->id ?>" name="platmodif">
                    </button>
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