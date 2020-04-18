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
        
        <a href="menuadmin.php?email=<?php echo $_GET['email']; ?>"> Revenir au menu administrateur </a>
    <?php } ?>
    

    </body>
</html>