<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<body>


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

                
            if($_GET['categorie']=='tresor'){
                $categorie='Ferraille ou Trésor';
            }
            if($_GET['categorie']=='musee'){
                $categorie='Bon pour le musée';
            }
            if($_GET['categorie']=='accessoire'){
                $categorie='Accessoire VIP';
            }?>

        <center><h1>Articles en vente de la catégorie : <?php echo $categorie;?></h1></center>
        <div class="container"> <?php

    // On récupère tout le contenu de la table item
        $reponse = $bdd->query("SELECT * FROM article WHERE Categorie='$categorie' " );//la requête SQL qu'on peut changer, ici j'ai pris l'exemple que le vendeur a pour ID 3

        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch())
        {
        ?>
            
                <div class="col-md-4">
                    <a href="pageitem.php?email=<?php echo $_GET['email']; ?>&amp;article=<?php echo $donnees['ID_article']; ?>">   
                    <center><h3><?php echo $donnees['Nom_article']; ?></h3>
                    <?php echo '<img src="http://localhost/Projet_piscine_complet/Photos_articles/' . $donnees["lien_photo_item"] . '" height="300"; width="300";>';?></center>
                    <?php if($donnees['Type_vente1']!=NULL){ ?>
                        <center><input type="button" name="Type_vente1" value="Vente immédiate" style="background-color:red; color:black;" disabled /></center>
                    <?php
                    }
                    if($donnees['Type_vente2']!=NULL){ ?>
                        <center><input type="button" name="Type_vente2" value="Enchère" style="background-color:yellow; color:black;" disabled /></center>
                    <?php 
                    }
                    if($donnees['Type_vente3']!=NULL){ ?>
                        <center><input type="button" name="Type_vente3" value="Meilleure offre" style="background-color:orange; color:black;" disabled /></center>
                    <?php  } ?>
                    <center><p>Prix = <?php echo $donnees['Prix']; ?> euros !</p></center>
                    
                    
                    </a>

                </div>  
            </p>
            
        <?php
        }

        $reponse->closeCursor(); // Termine le traitement de la requête
    
        ?>
        
        
     
    </div>