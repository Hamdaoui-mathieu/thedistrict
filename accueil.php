<?php

session_start();
include('header.php');
include("DAO.php");
$tableau = accueil();
$tableau2 = plat_populaire();

if(isset($_SESSION['commande_ok'])){
    // var_dump($_SESSION['commande_ok']);
    echo '<div id="message" class="alert-success">'; 
    echo $_SESSION["commande_ok"];
    echo '</div>';
    echo "<script type='text/javascript'>
    var cpt = 10;
    timer = setInterval(function(){
        if(cpt>0) // si on a pas encore atteint la fin
        {
            --cpt;
        }
        else // Si on atteint la fin du timer
        {
            var doc = document.getElementById('message');
            doc.hidden = true;
            clearInterval(timer);
        }
    }, 500);
    </script>";
    unset ($_SESSION['commande_ok']);
    
}else if(isset($_SESSION['commande_ko'])){
    // var_dump($_SESSION['commande_ko']);
    echo $_SESSION['commande_ko'];
    unset ($_SESSION['commande_ko']);
}

?>

<div class="bg1">
    <form method="post" action="search.php" class="float-right" role="search">
        <input class="search" name="search" type="search" placeholder="rechercher" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Go!</button>
    </form>
</div>
<br>


<div class="container-fluid">

    <div class="row">

        <?php foreach ($tableau as $categorie) :  ?>

            <!-- <div class="container-fluid"> -->

            <div class="col afftexton col-lg-4 col-md-4 col-sm-6 col-xs-12" >
     
                <a href="plat_categorie.php?id_categorie=<?= $categorie->id ?>">
             
                    <img class="zoom" src="/images_the_district/category/<?= $categorie->image ?>" class="rounded img-responsive;" height="250px" width="250px">
                </a>
        
                <br>
                <br>
                <div>
                    <p class="reseaux afftext"><strong><?= $categorie->libelle  ?></strong><br>
                </div>
            </div>

            <!-- </div> -->

            <!-- <br> -->
            <!-- </div> -->
        <?php endforeach; ?>

    </div>
</div>

<h2>Les plats du moments :</h2>
<br>
<div class="container-fluid">
    <div class="row">
        <?php foreach ($tableau2 as $categorie) :  ?>

            <!-- <div class="container-fluid"> -->

            <div class="col afftexton col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a class='' href="detail_plat.php?id=<?= $categorie->id ?>">

                    <img src="/images_the_district/food/<?= $categorie->image ?>" class="rounded img-responsive" height="255px" width="255px" ;>
                </a>
                <br>
                <br>
                <div>
                    <p class="reseaux afftext"><strong><?= $categorie->libelle  ?></strong><br>
                </div>
            </div>
            <!-- </div> -->

            <!-- <br> -->
            <!-- </div> -->
        <?php endforeach; ?>
    </div>
</div>
<br>
<br>

<?php
include('footer.php');
?>