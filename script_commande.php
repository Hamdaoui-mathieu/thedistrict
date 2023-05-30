<?php
session_start();
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



// include_once('header.php');
include_once ('DAO.php');

// var_dump($_REQUEST);

if(isset($_POST['nom'])){
    $nom= $_POST['nom'];
}

if(isset($_POST['prenom'])){
    $prenom= $_POST['prenom'];
}
if(isset($_POST['num'])){
    $num= $_POST['num'];
}

if(isset($_POST['email'])){
    $email= $_POST['email'];
}

if(isset($_POST['quantite'])){
    $quantite=$_POST['quantite'];
}

if(isset($_POST['adresse'])){
    $adresse=$_POST['adresse'];
}

if(isset($_POST['cp'])){
    $cp=$_POST['cp'];
}

if(isset($_POST['ville'])){
    $ville=$_POST['ville'];
}


$prix = $_POST['prix'];

//var_dump($_POST, $total, $date_commande, $adresse_complete);

$db = connexionBase();

try {

    $id_plat = $_POST['commande'];
    $etat = "En préparation";
    $date_commande = date("Y-m-d H:i:s");
    $adresse_complete = $adresse . "," . $cp . "," . $ville;
    $nom_client = $nom . " " . $prenom;
    $total= $prix * $quantite;

    $requete = $db->prepare("INSERT into commande (id_plat, quantite, total, date_commande,  etat, nom_client, telephone_client, email_client, adresse_client) 
    VALUES (:id_plat,  :quantite, :total, :date_commande, :etat,:nom_client, :telephone_client, :email, :adresse_client);");

    $requete->bindValue(":id_plat", $id_plat,   PDO::PARAM_STR);
    $requete->bindValue(":quantite", $quantite,   PDO::PARAM_STR);
    $requete->bindValue(":total", $total,   PDO::PARAM_STR);
    $requete->bindValue(":date_commande", $date_commande,   PDO::PARAM_STR);
    $requete->bindValue(":etat", $etat,   PDO::PARAM_STR);
    $requete->bindValue(":nom_client", $nom_client,   PDO::PARAM_STR);
    $requete->bindValue(":telephone_client", $num,   PDO::PARAM_STR);
    $requete->bindValue(":email", $email,   PDO::PARAM_STR);
    $requete->bindValue(":adresse_client", $adresse_complete,   PDO::PARAM_STR);


    $requete->execute();
    $requete->closeCursor();
 

    
    $mail = new PHPMailer(true);
    
    // On va utiliser le SMTP
    $mail->isSMTP();
    
    // On configure l'adresse du serveur SMTP
    $mail->Host       = 'localhost';    
    
    // On désactive l'authentification SMTP
    $mail->SMTPAuth   = false;    
    
    // On configure le port SMTP (MailHog)
    $mail->Port       = 1025;                                   
    
    // Expéditeur du mail - adresse mail + nom (facultatif)
    $mail->setFrom('from@thedistrict.com', 'The District Company');
    
    // Destinataire(s) - adresse et nom (facultatif)
    $mail->addAddress($email, $nom_client);
    // $mail->addAddress("client2@example.com"); 
    
    //Adresse de reply (facultatif)
    $mail->addReplyTo("reply@thedistrict.com", "Reply");
    
    //CC & BCC
    // $mail->addCC("cc@example.com");
    // $mail->addBCC("bcc@example.com");
    
    // On précise si l'on veut envoyer un email sous format HTML 
    $mail->isHTML(true);
    
    // On ajoute la/les pièce(s) jointe(s)
    // $mail->addAttachment('/path/to/file.pdf');
    
    // Sujet du mail
    $mail->Subject = 'Test PHPMailer';
    
    // Corps du message
    $mail->Body = "On teste l'envoi de mails avec PHPMailer";
    
    // On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs
    if ($mail){
        try {
            $mail->send();
                $_SESSION['commande_ok'] = 'Merci '. $nom_client . ', votre commande a bien été prise en compte. Un mail de confirmation va vous être envoyer à l\'adresse '. $email ;
                header('Location:accueil.php');
            } catch (Exception $e) {
                $_SESSION['commande_ko'] = "La commande n'a pas pu aboutir. Erreur : " .$mail->ErrorInfo; 
                header('Location:accueil.php');
            }
        }

} catch (PDOException $e) {
    // var_dump($requete->queryString);
    // var_dump($requete->errorInfo());
    echo "Erreur : " . $e->getMessage() . "<br>";
    die("Fin du script (script_commande.php)");
}

// header("Location: confirmation_commande.php");
// exit();

//démarrer mailHog: ~/go/bin/MailHog

?>
