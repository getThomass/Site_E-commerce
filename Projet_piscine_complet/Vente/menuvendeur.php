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
        <div class="container features">
            <!-- afficher image de fond du vendeur ainsi que sa photo profil, nom et prénom 
            afficher nombre d'article vendu, en vente,... -->
            <center><h1> Mon compte vendeur </h1></center>

            <table>
                    <tr>
                        <td><a href="miseenvente.php?email=blaisematuidi@edu.ece.fr"> <!-- <?php// echo $_GET['email']; ?> pour récupérer l'email mis avant (Thomas)-->
                            <input type="submit" value="Mettre en vente un nouvel article">
                            </a>
                        </td>
                        <td><a href="suivresesarticles.php?email=blaisematuidi@edu.ece.fr"> <!-- <?php// echo $_GET['email']; ?> pour récupérer l'email mis avant (Thomas)-->
                            <input type="submit" value="Mes articles">
                            </a>
                        </td>
                        <td><a href="consulteroffre.php?email=blaisematuidi@edu.ece.fr"> <!-- <?php// echo $_GET['email']; ?> pour récupérer l'email mis avant (Thomas)-->
                            <input type="submit" value="Consulter les offres">
                            </a>
                        </td>
                    </tr>
                    
            </table>

        </div>
    </body>
</html>