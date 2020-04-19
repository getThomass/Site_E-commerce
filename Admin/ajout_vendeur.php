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
	
	<title>Ajouter un vendeur</title>
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
	 	<div class="block">
	<form action="Verification_ajout_vendeur.php" method="POST" enctype="multipart/form-data"/>
	 	<table>
			<tr>
				<td>
					<input class="remplir" type="text" name="email" placeholder="Votre adresse mail"/>
				</td>
			</tr>
			<tr>
				<td>
					<input class="remplir" type="text" name="nom"  placeholder="Nom"/>
				</td>
			</tr>
			<tr>
				<td>
					<input class="remplir" type="text" name="prenom"  placeholder="Prénom"/>
				</td>
			</tr>
			<tr>
				<td>
				<input class="remplir" type="password" name="mdp" placeholder="Mot de passe"/>
				</td>
			</tr>
			<tr>
				<td>
					<input class="remplir" type="password" name="confirm_mdp" placeholder="Veuillez confirmer votre mot de passe"/>
				</td>
			</tr>
	 		<tr>
				<td>
					<input class="remplir1" type="file"  id="photo_profil" accept="image/png,image/jpeg" name="photo_profil" />
				</td>
			</tr>
				<td>
					<input class="remplir1" type="file" id="image_fond" accept="image/png,image/jpeg" name="image_fond" />
				</td>
			</tr>
			<tr>
				<td>
					<input class="remplir" type="text" name="pseudo" id="pseudo" placeholder="Pseudo" />
				</td>
			</tr>
	 	</table>
	 	<input type="submit" id ="valider" value="Valider" name="valider" /><br>
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
	 		</div>
	 			</footer>
</body>
</html>