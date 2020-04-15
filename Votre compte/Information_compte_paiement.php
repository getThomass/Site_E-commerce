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
								WHERE Email_ECE='{$_POST['email']}'
							") or die(print_r($bdd->errorInfo()));

		while($donnees=$reponse->fetch()){
				echo  '<table><tr><td>Nom: '.$donnees["Nom_acheteur"].'</td></tr><tr><td>Prenom: '.$donnees["Prenom_acheteur"].'</td></tr><tr><td>Adresse: '.$donnees["Adresse_ligne1"].'</td></tr><tr><td>Email :'.$donnees["Email_ECE"].'</td></tr></table>';
					$id_acheteur=$donnees["ID_acheteur"];
					$id_mdp=$donnees["Password"];
			}
		$reponse->closeCursor();
	 ?>
	 <form method="POST" action="Information_compte_paiement.php">
		 Si vous voulez connaitre vos informations de paiement, saisissez votre mot de passe:
		 <input type="password" name="mdp"id="mdp" />
		 <input type="submit" name="validation" value="Voir mes informations"/>
		 <?php 
		 	$email=$_POST["email"];
		  ?>
		 <input type="hidden" name="email" value="<?php echo $email; ?>" />
	</form>
	<?php 
		if($id_mdp==$_POST["mdp"]){
			try
			{
				$bdd = new PDO('mysql:host=localhost:3308;dbname=projetpiscine;charset=utf8', 'root', '');
			}
			catch (Exception $e)
			{
			        die('Erreur : ' . $e->getMessage());
			}
			$reponse_2=$bdd->query("SELECT *
									FROM infopaiement
									WHERE ID_acheteur='{$id_acheteur}'") or die(print_r($bdd->errorInfo()));
			while($donnees_2=$reponse_2->fetch()){	
				echo  '<table><tr><td>Carte: '.$donnees_2["Type_carte"].'</td></tr><tr><td>Prenom: '.$donnees_2["Numero_carte"].'</td></tr><tr><td>Nom du propriétaire de la carte: '.$donnees_2["Nom_carte"].'</td></tr><tr><td>Date d expiration :'.$donnees_2["Date_expiration"].'</td></tr><tr><td>Code de securité :'.$donnees_2["Code_securite"].'</td></tr></table>';
			}
			$reponse_2->closeCursor();			
		}else{
			echo "Le mot saisie n'est pas correct, veuillez réessayer.";
		}
		
				
	 ?>	
</body>
</html>