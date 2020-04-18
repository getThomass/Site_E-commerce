<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Connexion</title>
	 <link rel="stylesheet" a href="firstpage.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
	<body>
		<div class="container">
			<img src="bonhomme.jpg" alt="profil">
		<form method="POST" action="Connexion_Inscription/Verification_connexion.php">
			<div class="form-input">
				<i class="fa fa-user fa-2x cust" aria-hidden="true"></i>
				
				<input type="text" name="email" placeholder="Adresse mail"/></br>

				<i class="fa fa-lock fa-2x cust" aria-hidden="true"></i>
		
				<input type="password" name="mdp" placeholder="Mot de passe"/></br>
		
				<input type="submit" name="valider" value="connexion"/><br /><br />

				<a class="inscrit" href="Connexion_Inscription/Création_compte.html"> Pas encore inscrit ?</a>

			</div>
	

		</form>
	
</body>
</html>

<!-- <div id="inscription">Nouveau par ici ? <a href="Connexion_Inscription/Création_compte.html">Inscrivez-vous</a></div> -->