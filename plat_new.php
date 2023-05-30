<?php
include_once('headerAdmin.php');

?>

            <h1>Saisie d'un nouveau plat</h1>

                <a href="plat.php"><button>Retour à la liste des plats</button></a>

<br>
<br>

        <form action ="script_plat_ajout.php" method="post" enctype="multipart/form-data">

            <label for="nom_for_label">Nom du plat:</label><br>
            <input type="text" name="libelle" id="nom_for_label">
<br>
<br>

            <label for="url_for_label">Description :</label><br>
            <input type="text" name="description" id="url_for_label">
<br>
<br>
            <label for="url_for_label">Prix :</label><br>
            <input type="text" name="prix" id="url_for_label">
<br>
<br>    
            <label for="url_for_label">Catégorie :</label><br>
            <input type="text" name="id_cat" id="url_for_label">
<br>
<br>    
            <label for="url_for_label">Active :</label><br>
            <input type="text" name="active" id="url_for_label">
<br>
<br>
            <label id="picture" class="lb" for="picture"> Picture : </label>
            <input type="file" name="picture">
<br>
<br>
            <input type="submit" value="Ajouter">

        </form>
<?php
include_once ('footer.php');