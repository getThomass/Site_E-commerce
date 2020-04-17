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

        $reponse = $bdd->query("SELECT * FROM vendeur" );//la requête SQL qu'on peut changer, ici j'ai pris l'exemple que le vendeur a pour ID 3

        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch())
        {
        ?>
            <div class="col-lg-4">
                <p>
                
                Pseudo : <?php echo $donnees['Pseudo']; ?><br>
                Nom : <?php echo $donnees['Nom_vendeur']; ?><br>
                Prénom : <?php echo $donnees['Prenom_vendeur']; ?><br>
                Email ECE: <?php echo $donnees['Email_ECE']; ?><br>
                <?php echo '<img src="photos/' . $donnees["Lien_photo_vendeur"] . '" height="200"; width="200";>';?><br>
                
                
            
                <a href="confirmer_suppression_vendeur.php?email=<?php echo $_GET['email']; ?>&amp;vendeur=<?php echo $donnees['ID_vendeur']; ?>"><input type="button" name="supprimer" value="Supprimer"></a>
            </p>
            </div>
        <?php
        }

        $reponse->closeCursor(); // Termine le traitement de la requête
    
        ?>
        
        <a href="menuadmin.php?email=<?php echo $_GET['email']; ?>"> Revenir au menu admin </a>

    </body>
</html>