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
            <center><h1> Administration du site </h1></center>

            <table>
                    <tr>
                        <td><a href="miseenvente.php?email=adminsite@edu.ece.fr"> <!-- <?php// echo $_GET['email']; ?> pour récupérer l'email mis avant (Thomas)-->
                            <input type="submit" value="Mettre en vente un nouvel article">
                            </a>
                        </td>
                        <td><a href="suivresesarticles.php?email=adminsite@edu.ece.fr"> <!-- <?php// echo $_GET['email']; ?> pour récupérer l'email mis avant (Thomas)-->
                            <input type="submit" value="Supprimer un article">
                            </a>
                        </td>
                        <td><a href="ajoutervendeur.php?email=adminsite@edu.ece.fr"> <!-- <?php// echo $_GET['email']; ?> pour récupérer l'email mis avant (Thomas)-->
                            <input type="submit" value="Ajouter un nouveau vendeur">
                            </a>
                        </td>
                        <td><a href="supprimervendeur.php?email=adminsite@edu.ece.fr"> <!-- <?php// echo $_GET['email']; ?> pour récupérer l'email mis avant (Thomas)-->
                            <input type="submit" value="Supprimer  un vendeur">
                            </a>
                        </td>
                    </tr>
                    
            </table>

        </div>
    </body>
</html>