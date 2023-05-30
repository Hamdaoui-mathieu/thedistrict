<?php
include ('header.php');
include ("DAO.php");
$tableau = pizza();



?>

<body class="back">

<h1 class=" titre">Pizza savoureuse et chaude juste pour vous!</h1>
    
<div>


            <?php foreach ($tableau as $plat) : ?>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                        <img src="images_the_district/food/<?= $plat->image ?>" class="img-fluid rounded">
         
                        </div>
                
                        <div class="col-sm-6">

                            <div>
                                <br>
                                <p class="cadre"><strong><?= $plat->libelle  ?></strong><br>
                                <p class="cadre"><strong><?= $plat->description ?></strong><br>
                                <p class="cadre"><strong><?= $plat->active  ?></strong><br>
                                <p class="cadre"><strong><?= $plat->prix   ?></strong><br>

                            </div>
                        </div>
                 
                    <br>

                </div>

            <?php endforeach; ?>

            <?php

include('footer.php');
?>