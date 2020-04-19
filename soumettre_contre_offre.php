<?php
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=projetpiscine;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    //Si erreur on a un message d'erreur 
        die('Erreur : '.$e->getMessage());
}

$contreoffre=$_POST['contreoffreachat'];
$article=$_GET['article'];
$acheteur=$_GET['acheteur'];

$reponse = $bdd->query("SELECT * FROM negocier WHERE ID_article='$article' AND ID_acheteur='$acheteur'" );
    while ($donnees = $reponse->fetch()){
        $compteur=$donnees['Compteur'];
    }
$reponse->closeCursor();



    $req = $bdd->prepare("UPDATE negocier SET Compteur = :nvcompteur, Contre_offre = :nvcontreoffre WHERE ID_article='$article' AND ID_acheteur='$acheteur'");
    $req->execute(array(
        'nvcompteur' => $compteur+1,
        'nvcontreoffre' => $contreoffre
        ));

header('Location:menuvendeur.php?email=$email');


?>