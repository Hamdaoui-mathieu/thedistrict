<?php
include('headerAdmin.php');
include('DAO.php');
$tableau = users();
//var_dump($tableau);

?>
<div class="bg3">
    <h1 class="titre">Tout nos plats</h1>
</div>
<br>
<br>
<div class="container-fluid">

    <div class="row">
        <?php foreach ($tableau as $users) : ?>


            <div class="col col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <br>
                <br>
                <p class="cadre"><strong><?= $users->nom_prenom ?></strong><br>
                <p class="cadre"><strong><?= $users->email?></strong><br><br>
                <a href="script_delete_user.php?id=<?= $users->id ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur?');" class="button">Supprimer</a>

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