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
        <div class="container features">
        <form action="validerenchere.php" method="post">
<?php 
    $database = "ebayece";
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);

    $prixobjet1=100;
    $prixobjet2=400;
    $enchereactuelle1=10;
    if(isset($_POST['button1'])) {

        echo "Vous voulez achetez le 1er article";
        echo "le prix de base est fixé à :". $prixobjet1 ."€";
    }
    elseif(isset($_POST['button2'])) {
        echo "Vous voulez achetez le 2e article";
        echo "le prix de base est fixé à :". $prixobjet2 ."€";
    }
?>
        <Br/>Saississez un prix à soumettere aux enchères :
        <input type="text" name="prixpropose">€ <Br/>
        <input type="submit" name='validerenchere' value="valider l'enchère">

        </form>
        </div>
    </body>
</html>