<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valentin</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
	Achat immédiat<input type="checkbox" name="type_1" id="achat_immediat"/></br>
	Enchérir<input type="checkbox" name="type_2" id="encherir"/></br>
	Meilleur offre<input type="checkbox" name="type_3" id="meilleur_offre"/></br>
	<input type="submit" value="Valider" id="validation"disabled/>
</body>
</html>