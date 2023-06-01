<?php
include_once('headerAdmin.php');
include_once('DAO.php');

$idplat = $_POST["platmodif"];
foreach (ModifPlat($idplat) as $platmodif);

?>

            <h1>Modification d'un nouveau plat</h1>

                <a href="plat_form.php"><button>Retour à la liste des plats</button></a>

<br>
<br>

        <form action ="script_plat_modif.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value='<?= $idplat ?>' name='id'>
            <label for="nom_for_label">Nom du plat:</label><br>
            <input type="text" name="libelle" id="nom_for_label" value="<?= $platmodif->libelle ?>">
<br>
<br>

            <label for="url_for_label">Description :</label><br>
            <input type="text" name="description" id="url_for_label" value="<?= $platmodif->description ?>">
<br>
<br>
            <label for="url_for_label">Prix :</label><br>
            <input type="text" name="prix" id="url_for_label" value="<?= $platmodif->prix ?>">
<br>
<br>    
            <label for="url_for_label">Catégorie :</label><br>
            <input type="text" name="id_cat" id="url_for_label" value="<?= $platmodif->id_categorie ?>">
<br>
<br>    
            <label for="url_for_label">Active :</label><br>
            <input type="text" name="active" id="url_for_label" value="<?= $platmodif->active ?>">
<br>
<br>
            <label id="picture" class="lb" for="picture"> Picture : </label>
            <input type="file" name="picture" value="<?= $platmodif->image ?>">
<br>
<br>
            <input type="submit" value="Modifier">

        </form>
<?php
include_once ('footer.php');