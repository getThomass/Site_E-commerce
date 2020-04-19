<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
    
$article=2;//$_GET['article'];
$email='blaisematuidi@edu.ece.fr';//$_GET['email'];
$reponse = $bdd->query("SELECT * FROM article WHERE ID_article='$article'" );


while ($donnees = $reponse->fetch())
{?>
        <div class="col-md-12">
            <form action="soumettre_offre.php?article=<?php echo $article; ?>&amp;email=<?php echo $email; ?>" method="post" >
                <center><h3><?php echo $donnees['Nom_article']; ?></h3>
                <?php echo '<img src="Photo_article/' . $donnees["lien_photo_item"] . '" height="400"; width="400";>';?></center>
                <center><p>Description : <?php echo $donnees['Description']; ?> </p></center><br>
                <center><p>Prix fixé par le vendeur : <?php echo $donnees['Prix']; ?>€ </p></center>

                
                
                <center> <h3> Veuillez inscrire l'offre que vous souhaitez faire pour cet article: </h3><input type="text" name="offreachat" />€<br>
                
                <input type="submit" value="Valider mon offre" /></a>
                </center>
                  
            </form>
        </div> 
    


<?php
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
    ?>
    </div>
    <a href="panier.php?email=<?php echo $email; ?>">Revenir à mon panier</a>
    </body>
</html>