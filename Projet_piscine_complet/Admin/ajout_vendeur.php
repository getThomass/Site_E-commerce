<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajouter un vendeur</title>
</head>
<body>
	<form action="Verification_ajout_vendeur.php" method="POST" enctype="multipart/form-data"/>
	 	<table>
			<tr>
				<td>
					<input type="text" name="email" placeholder="Votre adresse mail"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="nom"  placeholder="Nom"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="prenom"  placeholder="Prénom"/>
				</td>
			</tr>
			<tr>
				<td>
				<input type="password" name="mdp" placeholder="Mot de passe"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="password" name="confirm_mdp" placeholder="Veuillez confirmer votre mot de passe"/>
				</td>
			</tr>
	 		<tr>
				<td>
					<input type="file"  id="photo_profil" accept="image/png,image/jpeg" name="photo_profil" />
				</td>
			</tr>
				<td>
					<input type="file" id="image_fond" accept="image/png,image/jpeg" name="image_fond" />
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" />
				</td>
			</tr>
	 	</table>
	 	<input type="submit" id ="valider" value="Valider" name="valider" />
	 </form>
</body>
</html>