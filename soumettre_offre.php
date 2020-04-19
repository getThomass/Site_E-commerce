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

$nouvelleoffre=$_POST['offreachat'];
$article=$_GET['article'];
$email=$_GET['email'];


$reponse = $bdd->query("SELECT * FROM acheteur WHERE Email_ECE='$email'" );
while ($donnees = $reponse->fetch())
{
    $acheteur=$donnees['ID_acheteur'];
} 
$reponse->closeCursor();

$req = $bdd->prepare('INSERT INTO negocier(ID_article, ID_acheteur, Prix_final) VALUES(:ID_article, :ID_acheteur, :Prix_final)');
$req->execute(array(
	'ID_article' => $article,
	'ID_acheteur' => $acheteur,
    'Prix_final' => $nouvelleoffre,
    ));

///header('Location:panier.php?email=$email');///Thomas il faut changer l'article dans le panier car l'enchere a déjà été faite


?>