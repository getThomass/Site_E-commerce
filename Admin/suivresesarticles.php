<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="suivresesarticles.css">
	
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

    if($_GET['email']!='adminsite@edu.ece.fr'){
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $result = $bdd->query(" SELECT * FROM vendeur WHERE Email_ECE='{$_GET['email']}'"); 
        while($donnees=$result->fetch()){
            $vendeur=$donnees['ID_vendeur'];
        }
        $result->closeCursor();

    

    // On récupère tout le contenu de la table item
        $reponse = $bdd->query("SELECT * FROM article WHERE ID_vendeur='$vendeur' " );//la requête SQL qu'on peut changer, ici j'ai pris l'exemple que le vendeur a pour ID 3

        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch())
        {
        ?>
            <div class="col-lg-4">
                <p class=descriptif>
                <tr>
                    <td><?php echo $donnees['Nom_article']; ?></td>
                    <td></td>
                    <td> Prix = <?php echo $donnees['Prix']; ?> euros !</td>
                </tr>
                <tr>
                    <td><?php echo '<img src="photos/' . $donnees["lien_photo_item"] . '" height="200"; width="200";>';?></td>
                    <td> Descrition = <strong><?php echo $donnees['Description']; ?></strong></td>
                </tr>
                <?php if($donnees['Type_vente1']!=NULL){ ?>
                    <input type="button" name="Type_vente1" value="L'article est en vente immédiate" style="background-color:red; color:black;" disabled />
                <?php
                }
                if($donnees['Type_vente2']!=NULL){ ?>
                    <input type="button" name="Type_vente2" value="L'article est en cours d'enchère" style="background-color:yellow; color:black;" disabled />
                <?php 
                }
                if($donnees['Type_vente3']!=NULL){ ?>
                    <input type="button" name="Type_vente3" value="L'article est en attente d'une meilleure offre" style="background-color:orange; color:black;" disabled />
                <?php  } ?>
                <a href="modifierarticleenvente.php?email=<?php echo $_GET['email']; ?>&amp;article=<?php echo $donnees['ID_article']; ?>"><input type="button" name="modifier" value="Modifier"></a>
                <a href="supprimerarticle.php?email=<?php echo $_GET['email']; ?>&amp;article=<?php echo $donnees['ID_article']; ?>"><input type="button" name="supprimer" value="Supprimer"></a>
            </p>
            </div>
        <?php
        }

        $reponse->closeCursor(); // Termine le traitement de la requête
    
        ?>
        
        <a href="menuvendeur.php?email=<?php echo $_GET['email']; ?>"> Revenir au menu vendeur </a>
    <?php } 
    else{
        $reponse2 = $bdd->query("SELECT * FROM article" );

        // On affiche chaque entrée une à une
        while ($donnees = $reponse2->fetch())
        {
        ?>
            <div class="col-lg-4">
                <p>
                <tr>
                    <td><?php echo $donnees['Nom_article']; ?></td>
                    <td></td>
                    <td> Prix = <?php echo $donnees['Prix']; ?> euros !</td>
                </tr>
                <tr>
                    <td><?php echo '<img src="photos/' . $donnees["lien_photo_item"] . '" height="200"; width="200";>';?></td>
                    <td> Descrition = <?php echo $donnees['Description']; ?></td>
                </tr>
                <?php if($donnees['Type_vente1']!=NULL){ ?>
                    <input type="button" name="Type_vente1" value="L'article est en vente immédiate" style="background-color:red; color:black;" disabled />
                <?php
                }
                if($donnees['Type_vente2']!=NULL){ ?>
                    <input type="button" name="Type_vente2" value="L'article est en cours d'enchère" style="background-color:yellow; color:black;" disabled />
                <?php 
                }
                if($donnees['Type_vente3']!=NULL){ ?>
                    <input type="button" name="Type_vente3" value="L'article est en attente d'une meilleure offre" style="background-color:orange; color:black;" disabled />
                <?php  } ?>
                <a href="supprimerarticle.php?email=<?php echo $_GET['email']; ?>&amp;article=<?php echo $donnees['ID_article']; ?>"><input type="button" name="supprimer" value="Supprimer"></a>
            </p>
            </div>
        <?php
        }

        $reponse2->closeCursor(); // Termine le traitement de la requête
    
        ?>
        
        <a class="btn" href="menuadmin.php?email=<?php echo $_GET['email']; ?>">Revenir au menu administrateur </a>
    <?php } ?>
    
    
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