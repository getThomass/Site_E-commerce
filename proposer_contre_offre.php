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

$email=$_GET['email'];
$rep = $bdd->query("SELECT * FROM vendeur WHERE Email_ECE='$email'");
    while ($fir = $rep->fetch())
    {
        $vendeur=$fir['ID_vendeur'];
    }
    $rep -> closeCursor();

$acheteur=$_GET['acheteur'];   
$article=$_GET['article'];


$reponse = $bdd->query("SELECT * FROM article WHERE ID_article='$article'" );


while ($donnees = $reponse->fetch())
{?>
        <div class="col-md-12">
            <form action="soumettre_contre_offre.php?article=<?php echo $article; ?>&amp;vendeur=<?php echo $vendeur; ?>&amp;acheteur=<?php echo $acheteur;?>" method="post" >
                <center><h3><?php echo $donnees['Nom_article']; ?></h3>
                <?php echo '<img src="Photo_article/' . $donnees["lien_photo_item"] . '" height="400"; width="400";>';?></center>
                <center><p>Description : <?php echo $donnees['Description']; ?> </p></center><br>
                <center><p>Prix fixé au dépôt de l'annonce : <?php echo $donnees['Prix']; ?>€ </p></center>
                <center><p>Offre faite par l'acheteur : <?php
                    $req = $bdd->query("SELECT * FROM negocier WHERE ID_article='$article' AND ID_acheteur='$acheteur'" );
                    while ($fff = $req->fetch()){
                        echo $fff['Prix_final'];
                    }
                    $req->closeCursor();

                ?>€ </p></center>

                
                
                <center> <h3> Veuillez inscrire la contre proposition que vous souhaitez faire au client: </h3><input type="text" name="contreoffreachat" />€<br>
                
                <input type="submit" value="Valider ma contre-proposition" /></a>
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