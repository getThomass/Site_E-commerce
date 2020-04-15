<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Menu</title>
</head>
<body>
	<?php 
		try
		{
			$bdd = new PDO('mysql:host=localhost:3308;dbname=projetpiscine;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}
		$reponse=$bdd->query(  'SELECT Email_ECE
								FROM acheteur
								WHERE Email_ECE="blaisematuidi@edu.ece.fr"'
							) or die(print_r($bdd->errorInfo()));
		while($donnees=$reponse->fetch()){
				echo '<a href="http://localhost/Projet_piscine/Votre%20compte/Information_compte.php?email='.$donnees["Email_ECE"].'">Votre Compte</a>';
			}
		$reponse->closeCursor();
 	?>
</body>
</html>