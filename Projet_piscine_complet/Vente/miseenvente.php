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
                    $("#date_fin_enchere").css("visibility","visible");
				}
				$("#validation").prop("disabled",false);
				if($(this).is($(":checked"))==false){
					if($("#achat_immediat").is($(":checked"))==false && $("#meilleur_offre").is($(":checked"))==false){
						$("#validation").prop("disabled",true);
					}
                    $("#date_fin_enchere").css("visibility","hidden");
				}
			}));
			if($("#meilleur_offre").change(function(){
				if($(this).is($(":checked"))){
					if($("#encherir").is($(":checked"))) {
						$("#encherir").prop("checked",false);
                        $("#date_fin_enchere").css("visibility","hidden");
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
            <form action="ajoutitem.php?email=<?php echo $_GET['email']; ?>" method="post" enctype="multipart/form-data">
                <h1> Mise en vente d'un objet : </h1>
                
                
                <table>
                    <tr>
                        <td>Nom de l'objet:</td>
                        <td><input type="text" name="nom" ></td>
                    </tr>
                    <tr>
                        <td>Description de l'objet:</td>
                        <td><textarea name="description" class="auto-style7" style="height: 110px; width: 400px"></textarea></td>
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
                            <input type="date" name="date_fin_enchere" id="date_fin_enchere" style="visibility:hidden"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Prix:</td>
                        <td><input type="text" name="prix"> €</td>
                    </tr>
                    <tr>
                        <td>Ajouter une photo de l'objet :</td>
                        <td> <input type="file" name="image"></td>
                    </tr>
                    <tr>
                        
                        <td colspan="2" align="center">
                        <input type="submit" value="Valider l'entrée de l'article" id="validation"disabled /> 
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>