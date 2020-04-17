<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vérification</title>
</head>
<body>
	<?php 
		if(isset($_POST["valider"])){
			$pseudo_vide=0;
			$erreur_pseudo=0;
			if(empty($_POST["pseudo"])){
				$pseudo_vide=1;
			}else{
				try
				{
					$bdd = new PDO('mysql:host=localhost:3308;dbname=projetpiscine;charset=utf8', 'root', '');
				}
				catch (Exception $e)
				{
				        die('Erreur : ' . $e->getMessage());
				}
				$reponse=$bdd->query('SELECT Pseudo
										FROM vendeur'
									) or die(print_r($bdd->errorInfo()));
				while($donnees=$reponse->fetch()){
					if($donnees["Pseudo"]==$_POST["pseudo"]){
						$erreur_pseudo=1;
					}
				}
				$reponse->closeCursor();
			}
			$photo_profil_vide=0;
			$image_fond_vide=0;
			if(!isset($_FILES["photo_profil"])){
				$photo_profil_vide=1;
			}
			if(!isset($_FILES["image_fond"])){
				$image_fond_vide=1;
			}
			if($photo_profil_vide==0&&$image_fond_vide==0&&$erreur_pseudo==0&&$pseudo_vide==0){
				try
				{
					$bdd = new PDO('mysql:host=localhost:3308;dbname=projetpiscine;charset=utf8', 'root', '');
				}
				catch (Exception $e)
				{
				        die('Erreur : ' . $e->getMessage());
				}
				$reponse=$bdd->query('SELECT Email_ECE,Prenom_acheteur,Nom_acheteur,Password
										FROM acheteur'
										) or die(print_r($bdd->errorInfo()));
				while($donnees=$reponse->fetch()){
						if($donnees["Email_ECE"]==$_POST["email"]){
							$prenom=$donnees["Prenom_acheteur"];
							$nom=$donnees["Nom_acheteur"];
							$mdp=$donnees["Password"];
					}
				}
				$reponse->closeCursor();
				$bdd->query("INSERT INTO vendeur
							 VALUES (NULL,'{$_POST['email']}','{$_POST['pseudo']}','$nom','$prenom','{$_FILES['photo_profil']['name']}','{$_FILES['image_fond']['name']}','$mdp');") or die(print_r($bdd->errorInfo()));		
				$name_photo=$_FILES["photo_profil"]["name"];
				$tmp_photo=$_FILES["photo_profil"]["tmp_name"];
				$name_fond=$_FILES["image_fond"]["name"];
				$tmp_fond=$_FILES["image_fond"]["tmp_name"];
				move_uploaded_file($tmp_photo,"Photo_vendeur/".$name_photo);
				move_uploaded_file($tmp_fond,"Fond_vendeur/".$name_fond);
				header('Location:http://localhost/Projet_piscine/Votre%20compte/acheteur_inscrit.html');
				exit();		
			}	
		}
	 ?>
	 <form action="verification_vendeur.php" method="POST" enctype="multipart/form-data"/>
	 	<table>
	 		<tr>
				<td>
					<input type="file"  id="photo_profil" accept="image/png,image/jpeg" name="photo_profil" />
				</td>
				<?php 
					if($image_fond_vide==1){
						echo '<td>Veuillez charger un image fond</td> ';
					}

				 ?>
			</tr>
				<td>
					<input type="file" id="image_fond" accept="image/png,image/jpeg" name="image_fond" />
				</td>
				<?php 
					if($photo_profil_vide==1){
						echo '<td>Veuillez charger un image de profil</td> ';
					}

				 ?>
			</tr>
			<tr>
				<td>
					<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" />
				</td>
					<?php 
						if($pseudo_vide==1){
							echo '<td>Veuillez saisir un pseudo</td>';
						}
						if($erreur_pseudo==1){
							echo '<td>Votre pseudo est déjà utilisé, choisissez en un autre</td>';
						}
					 ?>
			</tr>
			<tr>
				<td>
					<input type="text" name="email" id="email" value="<?php echo $_POST["email"]?>" style="visibility:hidden"/>
				</td>
			</tr>
	 	</table>
	 	<input type="submit" id ="valider" value="Valider" name="valider" />
	 </form>
</body>
</html>