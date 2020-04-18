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
    <center><h1>Articles en vente</h1></center>
    <div class="container">
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
    
$article=$_GET['article'];
$reponse = $bdd->query("SELECT * FROM article WHERE ID_article='$article'" );

    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {?>
    <div class="col-md-12">
         
                <center><h3><?php echo $donnees['Nom_article']; ?></h3>
                <?php echo '<img src="http://localhost/Projet_piscine_complet/Photos_articles/' . $donnees["lien_photo_item"] . '" height="400"; width="400";>';?></center>
                <center><p>Description : <?php echo $donnees['Description']; ?> </p></center><br>
                <center><p>Prix : <?php echo $donnees['Prix']; ?>€ </p></center>
                
                <center> <h3> Achetez tout de suite : </h3><br>
                <?php if($donnees['Type_vente1']!=NULL){ ?>
                    <a href="achatimmediat.php?email=<?php echo $_GET['email']; ?>&amp;article=<?php echo $donnees['ID_article']; ?>">
                    <input type="button" name="Type_vente1" value="Vente immédiate" style="background-color:red; color:black;" /></a>
                <?php
                    }
                if($donnees['Type_vente2']!=NULL){ ?>
                    <a href="proposerenchere.php?email=<?php echo $_GET['email']; ?>&amp;article=<?php echo $donnees['ID_article']; ?>">
                    <input type="button" name="Type_vente2" value="Enchère" style="background-color:yellow; color:black;" /></a>
                <?php 
                }
                if($donnees['Type_vente3']!=NULL){ ?>
                    <a href="proposeroffre.php?email=<?php echo $_GET['email']; ?>&amp;article=<?php echo $donnees['ID_article']; ?>">
                    <input type="button" name="Type_vente3" value="Meilleure offre" style="background-color:orange; color:black;"/></a>
                <?php  } ?></center><br>
                
                
                <center> <h3> Ou sinon prenez encore le temps de réfléchier : </h3><br>
                <a href="ajouepanier.php?email=<?php echo $_GET['email']; ?>&amp;article=<?php echo $donnees['ID_article']; ?>">
                <input type="button" name="Type_vente1" value="Mettre l'article dans le panier" /></a>
                </center>
                    

            </div> 
    


<?php
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
    ?>
    </div>
</body>
</html>