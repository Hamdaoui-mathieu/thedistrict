<?php
include('header.php');
include("DAO.php");
$tableau = categorie();
?>



<div class="bg2">
    <h1 class="titre">Categories</h1>   
</div>
<br>


<div class="container-fluid">
    <div class="row">
        <?php foreach ($tableau as $categorie) :  ?>


            <div class="col afftexton col-lg-3 col-md-4 col-sm-6 col-xs-12">

                <a href="plat_categorie.php?id_categorie=<?= $categorie->id ?>">
                    <img src="/images_the_district/category/<?= $categorie->image ?>"  class="rounded img-responsive ;" height="250px" width="250px">
                </a>
                <br>
                <br>
                <p class="cadre afftext"><strong><?= $categorie->libelle  ?></strong><br>


            </div>
        <?php endforeach; ?>
    </div>
</div>
<br>
<br>


</div>
<br>
<br>
<?php
include('footer.php');
?>