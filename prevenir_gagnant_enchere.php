<?php
 
    ini_set( 'display_errors', 1 );
 
    error_reporting( E_ALL );
 
    $from = "adminsite@edu.ece.fr";
 
   
 
    $subject = "EbayECE, vous avez gagné une enchère";

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projetpiscine;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    { 
        die('Erreur : '.$e->getMessage());
    }
    $article=$_GET['article'];
    $acheteur=$_GET['acheteur'];
    $prix=$_GET['prix'];

    $rep = $bdd->query("SELECT * FROM article WHERE ID_article='$article'" );
        while ($donnees = $rep->fetch())
        {
            $nom_article=$donnees['Nom_article'];
            $photo_article=$donnees['lien_photo_item'];
            $prixmax=$donnees['Prix'];
            $date_fin=$donnees['Date_fin'];
        }
    $rep ->closeCursor();

    $rep2 = $bdd->query("SELECT * FROM acheteur WHERE ID_acheteur=$acheteur" );
        while ($fct = $rep2->fetch())
        {
            $nom_acheteur=$fct['Nom_acheteur'];
            $prenom_acheteur=$fct['Prenom_acheteur'];
            $email=$fct['Email_ECE'];
        }
    $rep2 ->closeCursor();


    $to = '$email';


    $message = "Bonjour cher client $nom_acheteur $prenom_acheteur, 
                Nous tenons à vous informer que votre offre de $prix € a gagné l'enchère pour l'article suivant:
                $nom_article
                

                Cet article va être envoyé à votre adresse de livraison le plus rapidement possible.

                Merci beaucoup de votre fidélité nous espèrons vous retrouver très prochainement.

                Cordialement toute l'équipe de EbayECE

             ";
 

    $headers = "De:" . $from;
 
    mail($to, $subject, $message, $headers);
 
    echo "L'email a été envoyé au gagnant de l'enchère.";
?>
