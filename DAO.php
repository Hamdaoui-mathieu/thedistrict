<?php

include("db_the_district.php");

// accueil

function categorie()
{

    $db = connexionBase();
    $requete = $db->query("SELECT * FROM categorie WHERE id between '1' and '14'");
    $tableau = $requete->fetchall(PDO::FETCH_OBJ);
    $requete->closecursor();
    return $tableau;
}


function accueil()
{

    $db = connexionBase();
    $requete = $db->query("SELECT * FROM categorie limit 6");
    $tableau = $requete->fetchall(PDO::FETCH_OBJ);
    $requete->closecursor();
    return $tableau;
}

function plat_populaire()
{

    $db = connexionBase();
    $requete = $db->query("SELECT *, plat.id as id FROM plat 
    left join commande on commande.id_plat = plat.id
    GROUP BY plat.id
	 order by sum(commande.quantite) desc LIMIT 3");
    $tableau = $requete->fetchall(PDO::FETCH_OBJ);
    $requete->closecursor();
    return $tableau;
}

// catégorie

function id($id_categorie)
{

    $db = connexionBase();

    $requete = ("SELECT * FROM plat where id_categorie = :id_categorie");
    $requete2 = $db->prepare($requete);
    $requete2->execute([':id_categorie' => $id_categorie]);

    $tableau = $requete2->fetchAll(PDO::FETCH_OBJ);


    return $tableau;
}

// détail des plats

function detail($id)
{

    $db = connexionBase();

    $requete = ("SELECT * FROM plat where id = :id");
    $requete2 = $db->prepare($requete);
    $requete2->execute([':id' => $id]);

    $tableau = $requete2->fetchAll(PDO::FETCH_OBJ);


    return $tableau;
}

// tout les plats

function plat()
{

    $db = connexionBase();

    $requete = $db->query("SELECT * FROM plat order by id_categorie");
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();
    return $tableau;
}

// barre de recherche

function search_cat($search){
    $db = connexionBase();

    $libelle = '%'.$search.'%';
    $description = '%'.$search.'%';
    $recherche = $db->prepare('SELECT id, image, libelle 
                               FROM plat 
                               WHERE libelle LIKE :libelle
                               or   description LIKE  :description
                               AND active = "YES" ;');
    $recherche-> bindParam(':libelle', $libelle);
    $recherche -> bindParam(':description', $description);
    $recherche-> execute();
    $tableau = $recherche->fetchAll(PDO::FETCH_OBJ);
    $recherche->closecursor();
    return $tableau;
}

// administrateur

// suppression d'un plat

function delete_plat($id){
    $db = connexionBase();
    $requete = $db->prepare('DELETE FROM plat WHERE id = ?');
    $requete->execute(array($id));
    $requete->closeCursor();
    return true;
}

function utilisateur($email)
{
    $db = connexionBase();
    $requete = $db->prepare('SELECT id, nom_prenom, password FROM utilisateur WHERE email = :email LIMIT 1');
    $requete->bindParam(':email', $email);
    $requete->execute();
    $user = $requete->fetch();
    return $user;
}

// commande 

// creer une commande

function creer_commande($id_plat, $quantite, $total, $date_commande, $nom_client, $telephone_client, $email_client, $adresse_client){
    $etat = "En préparation";
    $db = connexionBase();
    $requete = $db-> prepare('INSERT into commande (id_plat, quantite, total, date_commande, nom_client, telephone_client, email_client, adresse_client, etat) 
                              VALUES (?,?,?,?,?,?,?,?,?);');
    $requete -> execute([$id_plat, $quantite, $total, $date_commande, $nom_client, $telephone_client, $email_client, $adresse_client, $etat]);
    $requete -> closeCursor();
    return true;
}

// toutes les commandes

function all_command(){
    $db= connexionBase();
    $requete = $db->query('SELECT * from commande');
    $requete->execute();
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();
    return $tableau;
    
}

//supprimer une commande

function delete_command($id){
    $db = connexionBase();
    $requete = $db->prepare('DELETE FROM commande WHERE id_commande = ?');
    $requete->execute(array($id));
    $requete->closeCursor();
    return true;
}



// function creerUtilisateur($nom, $login, $mdp){
//     try{
//         $pdo = connexionBase();
//         $pdo->beginTransaction();

//         $requete = $pdo->prepare("INSERT INTO utilisateur (nom_prenom, email, password) VALUES (:nom, :login, :mdp)");
//         $nom = $nom;
//         $login = $login;
//         $mdp = $mdp;
//         $requete->bindParam(':nom', $nom, PDO::PARAM_STR);
//         $requete->bindParam(':login', $login, PDO::PARAM_STR);
//         $requete->bindParam(':mdp', $mdp, PDO::PARAM_STR);
//         $requete->execute();

//         $pdo->commit();

//         $reponse = "OK";
//         return $reponse;

//     }catch(PDOException $e){
//         $pdo->rollback();
//         echo "Erreur : Une erreur est survenue. Veuillez recommencer!";
//         $reponse = "NON";
//         return $reponse;

//     }
   
// }


//fonctions panier

// function creerPanier(){
//     if (!isset($_SESSION['panier']))
//         {
//             $_SESSION['panier'] = array();
//             $_SESSION['panier']['libelleProduit'] = array();
//             $_SESSION['panier']['qteProduit'] = array();
//             $_SESSION['panier']['prixProduit'] = array();
//             $_SESSION['panier']['verrou'] = false;
//         }
//         return true;
// }

// function ajouterArticle($libelleProduit, $qteProduit, $prixProduit)
//     {
//         //si le panier existe
//         if(creerPanier() && !isVerrouille())
//         {
//             //si le produit existe déjà on ajoute seulement la quantité
//         $positionProduit = array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);

//         if($positionProduit !== false)
//         {
//             $_SESSION['panier']['qteProduit'][$positionProduit]+= $qteProduit ;
//         }
//         else
//         {//sinon on ajoute le produit
//             array_push($_SESSION['panier']['libelleProduit'], $libelleProduit);
//             array_push($_SESSION['panier']['qteProduit'], $qteProduit);
//             array_push($_SESSION['panier']['prixProduit'], $prixProduit);
//         }
//     }
//     else

//     echo "Un problème est survenu veuillez contactez l'administrateur du site.";

//     }

// function supprimerArticle( $libelleProduit){
//     // si le panier existe
//     if (creerPanier() && isVerrouille())
//     {
//         // Nous allons passer par un panier temporire
//     $tmp=array();
//     $tmp['libelleProduit'] = array();
//     }
// }
