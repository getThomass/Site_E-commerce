<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="miseenvente.css">
        <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script>
		$(document).ready(function(){
			if($("#achat_immediat").change(function(){
				if($(this).is($(":checked"))){
					$("#validation").prop("disabled",false);
				}
				if($(this).is($(":checked"))==false){
					if($("#encherir").is($(":checked"))==false && $("#meilleur_offre").is($(":checked"))==false){
						$("#validation").prop("disabled",true);
					}
				}
			}));
			if($("#encherir").change(function(){
				if($(this).is($(":checked"))){
					if($("#meilleur_offre").is($(":checked"))) {
						$("#meilleur_offre").prop("checked",false);
					}
				}
				$("#validation").prop("disabled",false);
				if($(this).is($(":checked"))==false){
					if($("#achat_immediat").is($(":checked"))==false && $("#meilleur_offre").is($(":checked"))==false){
						$("#validation").prop("disabled",true);
					}
				}
			}));
			if($("#meilleur_offre").change(function(){
				if($(this).is($(":checked"))){
					if($("#encherir").is($(":checked"))) {
						$("#encherir").prop("checked",false);
					}
				}
				$("#validation").prop("disabled",false);
				if($(this).is($(":checked"))==false){
					if($("#achat_immediat").is($(":checked"))==false && $("#encherir").is($(":checked"))==false){
						$("#validation").prop("disabled",true);
					}
				}
			}));
		});

	    </script>
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
        <div class="container features">
            <form action="ajoutitem.php?email=<?php echo $_GET['email']; ?>" method="post" enctype="multipart/form-data">
                <h1 class="titre"> Mise en vente d'un objet : </h1>
                
                
                <table>
                    <tr>
                        <td>Nom de l'objet:</td>
                        <td><input type="text" name="nom" ></td>
                    </tr>
                    <tr>
                        <td>Description de l'objet:</td>
                        <td><textarea name="description" class="auto-style7" style="height: 110px; width: 400px"></textarea></td>
                    </tr>
                    
                    <tr>
                        <td>Catégorie:</td>
                        <td><select name="categorie">
                                <option> Ferraille ou Trésor 
                                <option> Bon pour le muscle 
                                <option> Accessoire VIP
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Selectionnez le ou les types de vente:</td>
                        <td>
                            Achat immédiat<input type="checkbox" name="type_1" id="achat_immediat" style="margin-left:20px"/></br>
	                        Enchérir<input type="checkbox" name="type_2" id="encherir" style="margin-left:75px"/></br>
	                        Meilleur offre<input type="checkbox" name="type_3" id="meilleur_offre" style="margin-left:36px"/></br> 
                        </td>
                    </tr>
                    <tr>
                        <td>Prix:</td>
                        <td><input type="text" name="prix"> €</td>
                    </tr>
                    <tr>
                        <td>Ajouter une photo de l'objet :</td>
                        <td> <input type="file" name="image"></td>
                    </tr>
                    <tr>
                        
                        <td colspan="2" align="center">
                        <input type="submit" value="Valider l'entrée de l'article" id="validation"disabled /> 
                        </td>
                    </tr>
                </table>
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