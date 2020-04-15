<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Informations de votre compte</title>
</head>
<body>
	<h1>Information sur votre compte:</h1>
	<?php 
		try
		{
			$bdd = new PDO('mysql:host=localhost:3308;dbname=projetpiscine;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}
		$reponse=$bdd->query("	SELECT *
								FROM acheteur
								WHERE Email_ECE='{$_GET['email']}'
							") or die(print_r($bdd->errorInfo()));

		while($donnees=$reponse->fetch()){
			echo  '<table><tr><td>Nom: '.$donnees["Nom_acheteur"].'</td></tr><tr><td>Prenom: '.$donnees["Prenom_acheteur"].'</td></tr><tr><td>Adresse: '.$donnees["Adresse_ligne1"].'</td></tr><tr><td>Email :'.$donnees["Email_ECE"].'</td></tr></table>';
		}
	 ?>
	 <form method="POST" action="Information_compte_paiement.php">
		 Si vous voulez connaitre vos informations de paiement, saisissez votre mot de passe:
		 <input type="password" name="mdp"id="mdp" />
		 <input type="submit" name="validation" value="Voir mes informations"/>
		 <?php 
		 	$email=$_GET["email"];
		  ?>
		 <input type="hidden" name="email" value="<?php echo $email; ?>" />
	</form>	
</body>
</html>