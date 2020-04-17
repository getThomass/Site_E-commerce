# PROJET-PISCINE
Création d'un site web de E-commerce
<!DOCTYPE html>
<html>
 <head>

      <title>Ebay ECE</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet"
		   href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"> </script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="gardecss.css">
		

 </head>

 <!--https://www.pierre-giraud.com/html-css-apprendre-coder-cours/creation-menu-deroulant/ -->

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
	 					<li class="nav-item"><a class="nav-link"href="#">Panier</a></li>
	 					<li class="nav-item"><a class="nav-link"href="http://localhost/Projet_piscine_complet/Admin/menuadmin.php?email=<?php echo $_GET["email"];?>">Admin</a></li>
	 				</ul>
	 			</div>

        <!-- nav end-->
	 	</nav>
        <!-- header start-->
	 	<header class="page-header header container-fluid">
		    <script type="text/javascript">
		     $(document).ready(function()
			{$('.header').height($(window).height());});
			</script>
	 		<div class="overlay"></div>
	 		<div class="description">
	 			<h1>Page offciel d'Ebay ECE !</h1>
	 			<p>Amateurs de tresor ancien etes vous pret à realiser les plus grandes affaires de votre vies !!</p>
	 			<p> Bienvenue à la vente aux enchères en ligne de l'ECE Paris.</p> 

                <button><a href="http://localhost/Projet_piscine_complet/Achat/menuacheteur.php?email=<?php echo $_GET["email"];?>"><span class="affichage">Let's go !</span></a></button>
                			
	 		</div>
	 	</header>
	 	<!-- header end-->

	 	<div class="container features">
	 		<h1 class="feature-title"> Nos produits</h1>
	 		<div class="row">
	 			<div class="col-lg-4 col-md-4 col-sm-12">
	 				<img src="piece.png" class="img-fluid" alt="Piece de caesar"> 
	 				<p class="descriptif">Notre collection de piéces historique n'attende que vous.</p>
	 			</div>
	 			<div class="col-lg-4 col-md-4 col-sm-12">
	 				<img src="musee.png" class="img-fluid">
	 				<p class="descriptif">Ne Laissez pas les mussées s'aproprier de nombreuses et magnifique toiles.</p>
	 			</div>
	 			<div class="col-lg-4 col-md-4 col-sm-12">
	 				<img src="vip.png" class="img-fluid">
	 				<p class="descriptif">Du plus petit au plus grand nos bijoux brillent de milles feux. </p>
	 			</div> 
	 		</div>
	 	</div>
	 	

	 	<footer class="page-footer">
	 		<div class="container">
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
