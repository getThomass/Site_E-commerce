<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script>
		$(document).ready(function(){
			if($("#achat_immediat").change(function(){
				if($(this).is($(":checked"))){
					$("#validation").prop("disabled",false);
				}
				if($(this).is($(":checked"))==false){
					if($("#encherir").is($(":checked"))==false && $("#meilleur_offre").is($(":checked"))==false){
						$("#validation").prop("disabled",true);
					}
				}
			}));
			if($("#encherir").change(function(){
				if($(this).is($(":checked"))){
					if($("#meilleur_offre").is($(":checked"))) {
						$("#meilleur_offre").prop("checked",false);
					}
				}
				$("#validation").prop("disabled",false);
				if($(this).is($(":checked"))==false){
					if($("#achat_immediat").is($(":checked"))==false && $("#meilleur_offre").is($(":checked"))==false){
						$("#validation").prop("disabled",true);
					}
				}
			}));
			if($("#meilleur_offre").change(function(){
				if($(this).is($(":checked"))){
					if($("#encherir").is($(":checked"))) {
						$("#encherir").prop("checked",false);
					}
				}
				$("#validation").prop("disabled",false);
				if($(this).is($(":checked"))==false){
					if($("#achat_immediat").is($(":checked"))==false && $("#encherir").is($(":checked"))==false){
						$("#validation").prop("disabled",true);
					}
				}
			}));
		});

	    </script>
    </head>
    <body>
        <div class="container features">
            <form action="modifiearticle.php?article=<?php echo $_GET['article']; ?>&amp;email=<?php echo $_GET['email']; ?>" method="post" enctype="multipart/form-data">
                <h1> Modifier l'article : </h1>
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
                $reponse = $bdd->query("SELECT * FROM article WHERE ID_article='{$_GET['article']}'" );
                while($donnees=$reponse->fetch()){
                    $nom=$donnees['Nom_article'];
                    $description=$donnees['Description'];
                    $categorie=$donnees['Categorie'];
                    $prix=$donnees['Prix'];
                    
                }
                $reponse->closeCursor();
                ?>
                <table>
                    <tr>
                        <td>Nom de l'objet:</td>
                        <td><input type="text" name="nom" value="<?php echo $nom ?>"></td>
                    </tr>
                    <tr>
                        <td>Nouvelle description:</td>
                        <td><textarea name="description" class="auto-style7" style="height: 110px; width: 400px"> <?php echo $description ?></textarea></td>
                    </tr>
                    
                    <tr>
                        <td>Catégorie:</td>
                        <td><select name="categorie">
                                <option> Ferraille ou Trésor 
                                <option> Bon pour le muscle 
                                <option> Accessoire VIP
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Selectionnez le ou les types de vente:</td>
                        <td>
                            Achat immédiat<input type="checkbox" name="type_1" id="achat_immediat" style="margin-left:20px"/></br>
	                        Enchérir<input type="checkbox" name="type_2" id="encherir" style="margin-left:75px"/></br>
	                        Meilleur offre<input type="checkbox" name="type_3" id="meilleur_offre" style="margin-left:36px"/></br> 
                        </td>
                    </tr>
                    <tr>
                        <td>Prix:</td>
                        <td><input type="text" name="prix" value=" <?php echo $prix ?>"> €</td>
                    </tr>
                    <tr>
                        <td>Ajouter une photo de l'objet :</td>
                        <td> <input type="file" name="image"></td>
                    </tr>
                    <tr>
                        
                        <td colspan="2" align="center">
                        <input type="submit" value="Modifier l'article" id="validation"disabled /> 
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>