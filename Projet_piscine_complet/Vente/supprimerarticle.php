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

$idarticle=$_GET['article'];

$bdd->exec("DELETE FROM article WHERE ID_article=$idarticle");
?>

L'article a bien été supprimé.
<?php
if($_GET['email']!='adminsite@edu.ece.fr'){ ?>
<a href="suivresesarticles.php?email=<?php echo $_GET['email'];?>"> <input type="button" value="Revenir à mes annonces" /></a>
<?php }else{ ?>
    <a href="suivresesarticles.php?email=<?php echo $_GET['email'];?>"> <input type="button" value="Revenir aux annonces" /></a>
<?php } ?>