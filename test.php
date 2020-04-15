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



// On récupère tout le contenu de la table item
$reponse = $bdd->query('SELECT * FROM article' );//la requête SQL qu'on peut changer, ici j'ai pris l'exemple que le vendeur a pour ID 3

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>L'ID de l'objet est :</strong> : <?php echo $donnees['ID_article']; ?><br />
    Le de cet article est : <?php echo $donnees['Nom_article']; ?>, et il est vendu à <?php echo $donnees['Prix']; ?> euros !<br />
    <?php echo '<img src="photos/' . $donnees["lien_photo_item"] . '">';?>
     <br />
    
   </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>