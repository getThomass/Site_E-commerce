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

$nouvelleenchere=$_POST['propositionenchere'];
$article=$_GET['article'];
$email=$_GET['email'];


$reponse = $bdd->query("SELECT * FROM acheteur WHERE Email_ECE='$email'" );
while ($donnees = $reponse->fetch())
{
    $acheteur=$donnees['ID_acheteur'];
} 
$reponse->closeCursor();

$reponse2 = $bdd->query("SELECT * FROM article WHERE ID_article='$article'" );
while ($donnees = $reponse2->fetch())
{
    $prixmax=$donnees['Prix'];
    $date_debut=$donnees['Date_debut'];
    $date_fin=$donnees['Date_fin'];
} 
$reponse2->closeCursor();

$req = $bdd->prepare('INSERT INTO proposer_enchere(ID_article, ID_acheteur, Prix_max, Date_debut, Date_fin, Prix_donne) VALUES(:ID_article, :ID_acheteur, :Prix_max, :Date_debut, :Date_fin, :Prix_donne)');
$req->execute(array(
	'ID_article' => $article,
	'ID_acheteur' => $acheteur,
	'Prix_max' => $prixmax,
	'Date_debut' => $date_debut,
    'Date_fin' => $date_fin,
    'Prix_donne' => $nouvelleenchere
    ));

///header('Location:panier.php?email=$email');///Thomas il faut changer l'article dans le panier car l'enchere a déjà été faite
?>
