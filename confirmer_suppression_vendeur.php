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

$idvendeur=$_GET['vendeur'];

$bdd->exec("DELETE FROM vendeur WHERE ID_vendeur=$idvendeur");
?>

L'article a bien été supprimé.

<a href="menuadmin.php?email=<?php echo $_GET['email'];?>"> <input type="button" value="Revenir au menu admin" /></a>
