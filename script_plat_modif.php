<?php

 include_once('DAO.php');


    // Récupération du Nom :
    $id = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;
    $libelle = (isset($_POST['libelle']) && $_POST['libelle'] != "") ? $_POST['libelle'] : Null;
    $description = (isset($_POST['description']) && $_POST['description'] != "") ? $_POST['description'] : Null;
    $prix = (isset($_POST['prix']) && $_POST['prix'] != "") ? $_POST['prix'] : Null;
    $id_cat = (isset($_POST['id_cat']) && $_POST['id_cat'] != "") ? $_POST['id_cat'] : Null;
    $active = (isset($_POST['active']) && $_POST['active'] != "") ? $_POST['active'] : Null;

    if ($libelle == Null || $description == Null || $prix == Null || $id_cat == Null || $active == Null) {
        header("Location: plat_form.php");
        exit;
    }

if (isset($_FILES["picture"]) && $_FILES["picture"]["error"] == 0) {
   if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_FILES["picture"]) && $_FILES["picture"]["error"] != 0) {

            echo 'Erreur de chargement image';
        }
        else{
            echo 'Chargement image validé';
        }
            $format = array("img/jpg", "img/gif", "img/jpeg", "img/pjpeg", "img/png", "img/x-png", "img/tiff", "image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff", "image/jpg");
    
            $picsName = $_FILES["picture"]["name"];
            $picsType = $_FILES["picture"]["type"];
            $picsSize = $_FILES["picture"]["size"];
            $maxSize = 5 * 1024 * 1024;
    
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $picsType = finfo_file($finfo, $_FILES["picture"]["tmp_name"]);
    
            finfo_close($finfo);
    
      if (in_array($picsType, $format)){
    
                if (move_uploaded_file($_FILES["picture"]["tmp_name"], "images_the_district/food/" . $picsName)) {
    
                    var_dump($_FILES["picture"]["tmp_name"]);
                    var_dump($picsName);
                    try {
                        // $db = connexionBase();
                        // $requete = $db->prepare("UPDATE plat SET image = :picture WHERE id = :id;");
    
                        // $requete->bindvalue(':picture', $picsName, PDO::PARAM_STR);
                        // $requete->bindvalue(':id', $id, PDO::PARAM_INT);
    
                        // $requete->execute();
                        // $requete->closeCursor();
                    } catch (Exception $e) {
                        var_dump($requete->errorInfo());
                        print_r($_POST);
                        echo "Erreur :" . $requete->errorInfo()[2] . "<br>";
                        die("fin du script(script_plat_modif.php)");
                    }
                }
            } else {
                // Info si type de fichier non autorisé
                echo "Seul les fichiers: gif, jpeg, pjpeg, x-png, png, ou tiff sont autorisés. Merci de choisir parmi ce type cités.";
                exit;
            }
        }

    // require "db_the_district.php"; 
    // $db = connexionBase();

 echo $id.'<br>';
 echo $libelle.'<br>';
 echo $description.'<br>';
 echo $prix.'<br>';
 echo $picsName.'<br>';
 echo $id_cat.'<br>';
 echo $active.'<br>';
try {
    $db = connexionBase();
      $requete = $db->prepare("UPDATE plat SET libelle =:libelle, description = :description, prix = :prix,image = :picture, id_categorie = :id_cat, active = :active where id = :id;"); 

    $requete->bindValue(":id", $id, PDO::PARAM_INT);
    $requete->bindValue(":libelle", $libelle, PDO::PARAM_STR);
    $requete->bindValue(":description", $description, PDO::PARAM_STR);
    $requete->bindValue(":prix", $prix, PDO::PARAM_STR);
    $requete->bindvalue(':picture', $picsName, PDO::PARAM_STR);
    $requete->bindValue(":id_cat", $id_cat, PDO::PARAM_STR);
    $requete->bindValue(":active", $active, PDO::PARAM_STR);
    $requete->execute();


    $requete->closeCursor();
}

catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_plat_modif.php)");
}
}
//si image non modif
else {
    try {
        $db = connexionBase();
          $requete = $db->prepare("UPDATE plat SET libelle =:libelle, description = :description, prix = :prix, id_categorie = :id_cat, active = :active where id = :id;"); 
    
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        $requete->bindValue(":libelle", $libelle, PDO::PARAM_STR);
        $requete->bindValue(":description", $description, PDO::PARAM_STR);
        $requete->bindValue(":prix", $prix, PDO::PARAM_STR);
        $requete->bindValue(":id_cat", $id_cat, PDO::PARAM_STR);
        $requete->bindValue(":active", $active, PDO::PARAM_STR);
        $requete->execute();
    
    
        $requete->closeCursor();
    }
    
    catch (Exception $e) {
        var_dump($requete->queryString);
        var_dump($requete->errorInfo());
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_plat_modif.php)");
    }

}
header("Location: plat_modif.php");

exit;
