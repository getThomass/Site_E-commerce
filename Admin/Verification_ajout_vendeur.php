<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet"
		   href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"> </script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="ajout_vendeur.css">
	<title>Verification_vendeur</title>
</head>
<body>
	<!-- nav start-->
	 	<nav class="navbar navbar-expand-md">
	 		<a class="navbar-brand" href="#">Ebay ECE</a>
	 			<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
	 				<span class="navbar-toggler-icon"></span>
	 			</button>
	 			<div class="collapse navbar-collapse" id="main-navigation">
	 				<ul class="navbar-nav">
	 					<li class="deroulant"><a class="nav-link"href="#">Categorie</a>
                             <!-- création du menu déroulant -->
	 						<ul class="deroule">
	 							<li><a href="http://localhost/Projet_piscine_complet/Achat/categorie.php?email=<?php echo $_GET["email"];?>&amp;categorie=tresor">Trésor ou Ferraille</a></li>
	 							<li><a href="http://localhost/Projet_piscine_complet/Achat/categorie.php?email=<?php echo $_GET["email"];?>&amp;categorie=musee">Bon pour le musée</a></li>
	 							<li><a href="http://localhost/Projet_piscine_complet/Achat/categorie.php?email=<?php echo $_GET["email"];?>&amp;categorie=accessoire">Accesoire VIP</a></li>
	 						</ul>


	 					</li>
	 					<li class="nav-item"><a class="nav-link"href="http://localhost/Projet_piscine_complet/Achat/menuacheteur.php?email=<?php echo $_GET["email"];?>">Achat</a></li>
	 					<li class="nav-item"><a class="nav-link"href="http://localhost/Projet_piscine_complet/Vente/menuvendeur.php?email=<?php echo $_GET["email"];?>">Vendre</a></li>
	 					<li class="deroulant"><a class="nav-link"href="http://localhost/Projet_piscine_complet/Votre%20compte/Information_compte.php?email=<?php echo $_GET["email"];?>">Votre compte </a></li>
	 					<li class="nav-item"><a class="nav-link"href="http://localhost/Projet_piscine_complet/Panier/panier.php?email=<?php echo $_GET["email"];?>">Panier</a></li>
	 					<li class="nav-item"><a class="nav-link"href="http://localhost/Projet_piscine_complet/Admin/menuadmin.php?email=<?php echo $_GET["email"];?>">Admin</a></li>
	 				</ul>
	 			</div>

        <!-- nav end-->
	 	</nav>
	<?php 
	if(isset($_POST["valider"])){
		$mail_vide=0;
		$erreur_mail=0;					
		if(empty($_POST["email"])){
			$mail_vide=1;
		}else{
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=projetpiscine;charset=utf8', 'root', '');
			}
			catch (Exception $e)
			{
			        die('Erreur : ' . $e->getMessage());
			}
			$reponse_2=$bdd->query('SELECT Email_ECE
									FROM vendeur'
								) or die(print_r($bdd->errorInfo()));
			while($donnees_2=$reponse_2->fetch()){
				if($donnees_2["Email_ECE"]==$_POST["email"]){
					$erreur_mail=1;
				}
			}
			$reponse_2->closeCursor();	
		}
			$nom_vide=0;
			if(empty($_POST["nom"])){
				$nom_vide=1;
			}	

			$prenom_vide=0;
			if(empty($_POST["prenom"])){
				$prenom_vide=1;
			}
			
			$mdp_vide=0;
			if(empty($_POST["mdp"])){
				$mdp_vide=1;
			}

			$confirm_mdp_vide=0;
			$erreur_confirm_mdp=0;
			if(empty($_POST["confirm_mdp"])){
				$confirm_mdp_vide=1;
			}else{
				if(empty($_POST["mdp"])){

				}else{
					if($_POST["mdp"]!=$_POST["confirm_mdp"]){
						$erreur_confirm_mdp=1;
					}
				}
			}
			$pseudo_vide=0;
			$erreur_pseudo=0;
			if(empty($_POST["pseudo"])){
				$pseudo_vide=1;
			}else{
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=projetpiscine;charset=utf8', 'root', '');
				}
				catch (Exception $e)
				{
				        die('Erreur : ' . $e->getMessage());
				}
				$reponse=$bdd->query('SELECT Pseudo
										FROM vendeur'
									) or die(print_r($bdd->errorInfo()));
				while($donnees=$reponse->fetch()){
					if($donnees["Pseudo"]==$_POST["pseudo"]){
						$erreur_pseudo=1;
					}
				}
				$reponse->closeCursor();
			}
			$photo_profil_vide=0;
			$image_fond_vide=0;
			if(!isset($_FILES["photo_profil"])){
				$photo_profil_vide=1;
			}
			if(!isset($_FILES["image_fond"])){
				$image_fond_vide=1;
			}
			if($photo_profil_vide==0&&$image_fond_vide==0&&$erreur_pseudo==0&&$pseudo_vide==0&&$confirm_mdp_vide==0&&$erreur_confirm_mdp==0&&$mail_vide==0&&$erreur_mail==0&&$nom_vide==0&&$prenom_vide==0&&$mdp_vide==0){
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=projetpiscine;charset=utf8', 'root', '');
				}
				catch (Exception $e)
				{
				        die('Erreur : ' . $e->getMessage());
				}
				$reponse=$bdd->query('SELECT Email_ECE,Prenom_acheteur,Nom_acheteur,Password
										FROM acheteur'
										) or die(print_r($bdd->errorInfo()));
				while($donnees=$reponse->fetch()){
						if($donnees["Email_ECE"]==$_POST["email"]){
							$prenom=$donnees["Prenom_acheteur"];
							$nom=$donnees["Nom_acheteur"];
							$mdp=$donnees["Password"];
					}
				}
				$reponse->closeCursor();
				$bdd->query("INSERT INTO vendeur
							 VALUES (NULL,'{$_POST['email']}','{$_POST['pseudo']}','$nom','$prenom','{$_FILES['photo_profil']['name']}','{$_FILES['image_fond']['name']}','$mdp');") or die(print_r($bdd->errorInfo()));		
				$name_photo=$_FILES["photo_profil"]["name"];
				$tmp_photo=$_FILES["photo_profil"]["tmp_name"];
				$name_fond=$_FILES["image_fond"]["name"];
				$tmp_fond=$_FILES["image_fond"]["tmp_name"];
				move_uploaded_file($tmp_photo,"Photo_vendeur/".$name_photo);
				move_uploaded_file($tmp_fond,"Fond_vendeur/".$name_fond);
				header('Location:http://localhost/Projet_piscine_complet/Admin/Ajout_vendeur_reussi.php');
				exit();		
			}	
		}
	 ?>
	 <div class="block">
	<form action="Verification_ajout_vendeur.php" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td>
					<input class="remplir" type="text" name="email" placeholder="Votre adresse mail"/>
				</td>
				<?php 
					if($mail_vide==1){
						echo '<td><div id="email_vide">Veuillez saisir votre adresse email</div></td>';
					}
					if($erreur_mail==1){
						echo '<td><div id="erreur_mail">Cette adresse email est déjà utilisé, veuillez en saisir une autre</div></td>';
					}
				 ?>									
			</tr>
			<tr>
				<td>
					<input class="remplir" type="text" name="nom"  placeholder="Nom"/>
				</td>
				<?php 
					if($nom_vide==1){
						echo '<td><div id="nom_vide">Veuillez saisir votre nom</div></td>';
					}
				 ?>
			</tr>
			<tr>
				<td>
					<input class="remplir" type="text" name="prenom" placeholder="Prénom"/>
				</td>
				<?php 
					if($prenom_vide==1){
						echo '<td><div id="prenom_vide">Veuillez saisir votre prenom</div></td>';
					}
				 ?>
			</tr>
			<tr>
				<td>
					<input class="remplir" type="password" name="mdp" placeholder="Mot de passe"/>
				</td>
				<?php 
					if($mdp_vide==1){
						echo '<td><div id="mdp_vide">Veuillez saisir un mot de passe</div></td>';
					}
				 ?>
			</tr>
			<tr>
				<td>
					<input class="remplir" type="password" name="confirm_mdp" placeholder="Veuillez confirmer votre mot de passe"/>
				</td>
				<?php 
					if($confirm_mdp_vide==1){
						echo '<td><div id="confirm_mdp_vide">Veuillez confirmer votre mot de passe</div></td>';
					}
					if($erreur_confirm_mdp==1){
						echo '<td><div id="confirm_mdp_vide">Les mot de passes doivent être identiques</div></td>';
					}			
				 ?>
			</tr>
			<tr>
				<td>
					<input class="remplir1" type="file"  id="photo_profil" accept="image/png,image/jpeg" name="photo_profil" />
				</td>
				<?php 
					if($image_fond_vide==1){
						echo '<td>Veuillez charger un image fond</td> ';
					}

				 ?>
			</tr>
				<td>
					<input class="remplir1" type="file" id="image_fond" accept="image/png,image/jpeg" name="image_fond" />
				</td>
				<?php 
					if($photo_profil_vide==1){
						echo '<td>Veuillez charger un image de profil</td> ';
					}

				 ?>
			</tr>
			<tr>
				<td>
					<input class="remplir" type="text" name="pseudo" id="pseudo" placeholder="Pseudo" />
				</td>
					<?php 
						if($pseudo_vide==1){
							echo '<td>Veuillez saisir un pseudo</td>';
						}
						if($erreur_pseudo==1){
							echo '<td>Votre pseudo est déjà utilisé, choisissez en un autre</td>';
						}
					 ?>
			</tr>
			<tr>
				<td>
					<input type="text" name="email" id="email" value="<?php echo $_POST["email"]?>" style="visibility:hidden"/>
				</td>
			</tr>
	 	</table>
	 	<input type="submit" id ="valider" value="Valider" name="valider" />
	 </form>
	</div>

	 <footer class="page-footer">
	 		<div class="foot">
	 			<div class="row">
	 				<div class="col-lg-8 col-md-8 col-sm-12">
	 					<h6 class="text-uppercase font-weight-bold">En savoir plus...</h6>
	 					<p>Actuellement en 3éme année au sein de l'ECE et passioné d'art. Nous vous proposons une plateforme gratuite dédié à la vente et l'achat d'oeuvre d'art. </p>
	 					<p>N'hésitez pas à nous contacter pour plus d'informations diverses ! </p>
	 				</div>
	 				<div class="col-lg-4 col-md-4 col-sm-12">
	 					<h6 class="text-uppercase font-weight-bold">Contact</h6>
	 					<p>37, quai de Grenelle, 75015 Paris, France <br>
	 						 ofcardpaul@gmail.com <br>
	 						 val95ccc@gmail.com<br>
	 						 totodelite94@gmail.com</p>
	 					</div>
	 				</div>
	 				<div class="footer-copyright text-center">&copy; 2020 Copyright | Droit d'auteur: EbayECE.ece.fr</div>
	 			</footer>
</body>
</html>