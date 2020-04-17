<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Connexion</title>
</head>
<body>
	<?php 
		if(isset($_POST["valider"])){
			$email_vide=0;
			$erreur_email=1;
			$mdp_vide=0;
			$email_mdp_valide=2;
			if(empty($_POST["mdp"])){
				$mdp_vide=1;
			}
			if(empty($_POST["email"])){
				$email_vide=1;
			}else{
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=projetpiscine;charset=utf8', 'root', '');
				}
				catch (Exception $e)
				{
				        die('Erreur : ' . $e->getMessage());
				}
				$reponse=$bdd->query('SELECT Email_ECE,Password
										FROM acheteur'
									) or die(print_r($bdd->errorInfo()));
				while($donnees=$reponse->fetch()){
					if($donnees["Email_ECE"]==$_POST["email"]){
						if($donnees["Password"]==$_POST["mdp"]&&$mdp_vide==0){
							$email_mdp_valide=0;
						}else{
							$email_mdp_valide=1;
						}
						$erreur_email=0;
					}
				}
				$reponse->closeCursor();
				$reponse_2=$bdd->query('SELECT Email_ECE,Password
										FROM vendeur'
									) or die(print_r($bdd->errorInfo()));
				while($donnees_2=$reponse_2->fetch()){
					if($donnees_2["Email_ECE"]==$_POST["email"]){
						if($donnees_2["Password"]==$_POST["mdp"]&&$mdp_vide==0){
							$email_mdp_valide=0;
						}else{
							$email_mdp_valide=1;
						}
						$erreur_email=0;
					}
				}
				$reponse_2->closeCursor();	
			}
			if($email_vide==0&&$erreur_email==0&&$mdp_vide==0&&$email_mdp_valide==0){
				header('Location:http://localhost/Projet_piscine_complet/Menu_principal/pagedegarde.php?email='.$_POST["email"]);
				exit();
			}
		}

	 ?>
	<form method="POST" action="page_verification.php">
		<input type="text" name="email" placeholder="Adresse mail"/>
		<?php 

		if($email_vide==1){
			echo 'Veuillez saisir votre email';
		}else{
			if($erreur_email==1){
				echo 'Veuillez saisir un email valide';
			}
		} 
		?>
		</br>
		<input type="password" name="mdp" placeholder="Mot de passe"/>
		<?php 
		if($mdp_vide==1){
			echo 'Veuillez saisir votre mot de passe';
		}else{
			if($email_mdp_valide==1){
				echo 'Le mot de passe ne correspond pas';
			}
		} 
		?>
		</br>
		<input type="submit" name="valider" value="connexion"/>
	</form>
	<div id="inscription">Nouveau par ici ? <a href="http://localhost/Projet_piscine/Inscription/Cr%c3%a9ation_compte.html">Inscrivez-vous</a></div>
</body>
</html>