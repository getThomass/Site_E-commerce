<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Création de votre compte</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<?php
	$mail_vide=0;
	$erreur_mail=0;
	if(isset($_POST["valider"])){					
		if(empty($_POST["email"])){
			$mail_vide=1;
		}else{
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=projetpiscine;charset=utf8', 'root', '');
			}
			catch (Exception $e)
			{
			        die('Erreur : ' . $e->getMessage());
			}
			$reponse=$bdd->query('SELECT Email_ECE
									FROM acheteur'
								) or die(print_r($bdd->errorInfo()));
			while($donnees=$reponse->fetch()){
				if($donnees["Email_ECE"]==$_POST["email"]){
					$erreur_mail=1;
				}
			}
			$reponse->closeCursor();
			$reponse_2=$bdd->query('SELECT Email_ECE
									FROM vendeur'
								) or die(print_r($bdd->errorInfo()));
			while($donnees_2=$reponse_2->fetch()){
				if($donnees_2["Email_ECE"]==$_POST["email"]){
					$erreur_mail=1;
				}
			}
			$reponse_2->closeCursor();	
		}


			$nom_vide=0;
			if(empty($_POST["nom"])){
				$nom_vide=1;
			}	

			$prenom_vide=0;
			if(empty($_POST["prenom"])){
				$prenom_vide=1;
			}
			
			$mdp_vide=0;
			if(empty($_POST["mdp"])){
				$mdp_vide=1;
			}

			$confirm_mdp_vide=0;
			$erreur_confirm_mdp=0;
			if(empty($_POST["confirm_mdp"])){
				$confirm_mdp_vide=1;
			}else{
				if(empty($_POST["mdp"])){

				}else{
					if($_POST["mdp"]!=$_POST["confirm_mdp"]){
						$erreur_confirm_mdp=1;
					}
				}
			}

			$photo_profil_vide=0;
			$fond_vide=0;
			if (isset($_POST["choix_vendeur"])) {
				if(isset($_FILES["photo_profil"])){

				}else{
					$photo_profil_vide=1;
				}
				if(isset($_FILES["image_fond"])){

				}else{
					$fond_vide=1;
				}
				if(empty($_POST["pseudo"])){
					$pseudo_vide=1;
				}
			}

			$erreur_pseudo=0;
			$pseudo_vide=0;
			if (isset($_POST["choix_vendeur"])){
				if(empty($_POST["pseudo"])){
					$pseudo_vide=1;
				}else{
					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=projetpiscine;charset=utf8', 'root', '');
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
			}

			$code_p_vide=0;
			$adresse_vide=0;
			$ville_vide=0;
			$num_vide=0;
			if (isset($_POST["choix_acheteur"])) {

				if(empty($_POST["code_p"])){
					$code_p_vide=1;
				}
				if(empty($_POST["adresse_1"])){
					$adresse_vide=1;
				}
				if(empty($_POST["ville"])){
					$ville_vide=1;
				}
				if(empty($_POST["num"])){
					$num_vide=1;
				}
			}

			
			if($mail_vide==0&&$erreur_mail==0&&$nom_vide==0&&$prenom_vide==0&&$mdp_vide==0&&$confirm_mdp_vide==0&&$erreur_confirm_mdp==0&&$photo_profil_vide==0&&$fond_vide==0&&$pseudo_vide==0&&$erreur_pseudo==0&&$code_p_vide==0&&$adresse_vide==0&&$ville_vide==0&&$num_vide==0){
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=projetpiscine;charset=utf8', 'root', '');
				}
				catch (Exception $e)
				{
				        die('Erreur : ' . $e->getMessage());
				}
				if(empty($_POST["choix_vendeur"])){
					$bdd->query("INSERT INTO acheteur
								 VALUES (NULL,'{$_POST['email']}','{$_POST['nom']}','{$_POST['prenom']}','{$_POST['adresse_1']}','{$_POST['adresse_2']}','{$_POST['ville']}','{$_POST['code_p']}','{$_POST['pays']}','{$_POST['mdp']}','{$_POST['num']}');"
									) or die(print_r($bdd->errorInfo()));

				}
				elseif(empty($_POST["choix_acheteur"])){
					$bdd->query("INSERT INTO vendeur
										  VALUES (NULL,'{$_POST['email']}','{$_POST['pseudo']}','{$_POST['nom']}','{$_POST['prenom']}','{$_FILES['photo_profil']['name']}','{$_FILES['image_fond']['name']}','{$_POST['mdp']}');") or die(print_r($bdd->errorInfo()));
					
					$name_photo=$_FILES["photo_profil"]["name"];
					$tmp_photo=$_FILES["photo_profil"]["tmp_name"];
					$name_fond=$_FILES["image_fond"]["name"];
					$tmp_fond=$_FILES["image_fond"]["tmp_name"];
					move_uploaded_file($tmp_photo,"Photo_vendeur/".$name_photo);
					move_uploaded_file($tmp_fond,"Fond_vendeur/".$name_fond);	
				}
				else{
					$bdd->query("INSERT INTO vendeur
										  VALUES (NULL,'{$_POST['email']}','{$_POST['pseudo']}','{$_POST['nom']}','{$_POST['prenom']}','{$_FILES['photo_profil']['name']}','{$_FILES['image_fond']['name']}','{$_POST['mdp']}');"
									) or die(print_r($bdd->errorInfo()));
					$bdd->query("INSERT INTO acheteur
								 VALUES (NULL,'{$_POST['email']}','{$_POST['nom']}','{$_POST['prenom']}','{$_POST['adresse_1']}','{$_POST['adresse_2']}','{$_POST['ville']}','{$_POST['code_p']}','{$_POST['pays']}','{$_POST['mdp']}','{$_POST['num']}');"
									) or die(print_r($bdd->errorInfo()));
					$name_photo=$_FILES["photo_profil"]["name"];
					$tmp_photo=$_FILES["photo_profil"]["tmp_name"];
					$name_fond=$_FILES["image_fond"]["name"];
					$tmp_fond=$_FILES["image_fond"]["tmp_name"];
					move_uploaded_file($tmp_photo,"Photo_vendeur/".$name_photo);
					move_uploaded_file($tmp_fond,"Fond_vendeur/".$name_fond);	
				}				
				header('Location:http://localhost/Projet_piscine_complet/Menu_principal/pagedegarde.php?email='.$_POST["email"]);
				exit();
			}
			
	}		

 ?>
 	<script>
		$(document).ready(function(){
			if($("#choix_vendeur").change(function(){
				if($(this).is($(":checked"))){
					$("#photo_profil").css("visibility","visible");
					$("#image_fond").css("visibility","visible");
					$("#pseudo").css("visibility","visible");
				<?php  
					if($photo_profil_vide==1){
						echo '$("#pas_de_photo").css("visibility","visible");';
					}
					if($fond_vide==1){
						echo '$("#pas_de_fond").css("visibility","visible");';
					}
					if($pseudo_vide==1){
						echo '$("#pseudo_vide").css("visibility","visible");';
					}
					if($erreur_pseudo==1){
						echo '$("#pseudo_prit").css("visibility","visible");';
					}
				?>
				}
				else if(($(this).is($(":checked"))==false)&&($($("#choix_acheteur")).is($(":checked"))==false)){
					$("#choix_acheteur").prop("checked",true);
					$("#adresse_1").css("visibility","visible");
					$("#td_adresse_2").css("visibility","visible");
					$("#ville").css("visibility","visible");
					$("#code_p").css("visibility","visible");
					$("#pays").css("visibility","visible");
					$("#num").css("visibility","visible");
					$("#photo_profil").css("visibility","hidden");
					$("#image_fond").css("visibility","hidden");
					$("#pseudo").css("visibility","hidden");
					<?php 
						if($code_p_vide==1){
							echo '$("#code_p_vide").css("visibility","visible");';
						}
						if($adresse_vide==1){
							echo '$("#adresse_vide").css("visibility","visible");';
						}
						if($ville_vide==1){
							echo '$("#ville_vide").css("visibility","visible");';
						}
						if($num_vide==1){
							echo '$("#num_vide").css("visibility","visible");';
						}
					 ?>
					<?php  
						if($photo_profil_vide==1){
							echo '$("#pas_de_photo").css("visibility","hidden");';
						}
						if($fond_vide==1){
							echo '$("#pas_de_fond").css("visibility","hidden");';
						}
						if($pseudo_vide==1){
							echo '$("#pseudo_vide").css("visibility","hidden");';
						}
						if($erreur_pseudo==1){
							echo '$("#pseudo_prit").css("visibility","hidden");';
						}
					?>
				}
				else{
					$("#photo_profil").css("visibility","hidden");
					$("#image_fond").css("visibility","hidden");
					$("#pseudo").css("visibility","hidden");
				<?php  
					if($photo_profil_vide==1){
						echo '$("#pas_de_photo").css("visibility","hidden");';
					}
					if($fond_vide==1){
						echo '$("#pas_de_fond").css("visibility","hidden");';
					}
					if($pseudo_vide==1){
						echo '$("#pseudo_vide").css("visibility","hidden");';
					}
					if($erreur_pseudo==1){
						echo '$("#pseudo_prit").css("visibility","hidden");';
					}
				?>	
				}					
			}));
			if($("#choix_acheteur").change(function(){
				if($(this).is($(":checked"))){
					$("#adresse_1").css("visibility","visible");
					$("#td_adresse_2").css("visibility","visible");
					$("#ville").css("visibility","visible");
					$("#code_p").css("visibility","visible");
					$("#pays").css("visibility","visible");
					$("#num").css("visibility","visible");
					<?php 
						if($code_p_vide==1){
							echo '$("#code_p_vide").css("visibility","visible");';
						}
						if($adresse_vide==1){
							echo '$("#adresse_vide").css("visibility","visible");';
						}
						if($ville_vide==1){
							echo '$("#ville_vide").css("visibility","visible");';
						}
						if($num_vide==1){
							echo '$("#num_vide").css("visibility","visible");';
						}
					 ?>
				}
				else if(($(this).is($(":checked"))==false)&&($($("#choix_vendeur")).is($(":checked"))==false)){
					$("#choix_vendeur").prop("checked",true);
					$("#photo_profil").css("visibility","visible");
					$("#image_fond").css("visibility","visible");
					$("#pseudo").css("visibility","visible");
					$("#adresse_1").css("visibility","hidden");
					$("#td_adresse_2").css("visibility","hidden");
					$("#ville").css("visibility","hidden");
					$("#code_p").css("visibility","hidden");
					$("#pays").css("visibility","hidden");
					$("#num").css("visibility","hidden");
					<?php  
						if($photo_profil_vide==1){
							echo '$("#pas_de_photo").css("visibility","visible");';
						}
						if($fond_vide==1){
							echo '$("#pas_de_fond").css("visibility","visible");';
						}
						if($pseudo_vide==1){
							echo '$("#pseudo_vide").css("visibility","visible");';
						}
						if($erreur_pseudo==1){
							echo '$("#pseudo_prit").css("visibility","visible");';
						}
					?>
					<?php 
						if($code_p_vide==1){
							echo '$("#code_p_vide").css("visibility","hidden");';
						}
						if($adresse_vide==1){
							echo '$("#adresse_vide").css("visibility","hidden");';
						}
						if($ville_vide==1){
							echo '$("#ville_vide").css("visibility","hidden");';
						}
						if($num_vide==1){
							echo '$("#num_vide").css("visibility","hidden");';
						}
					 ?>
				}
				else{
					$("#adresse_1").css("visibility","hidden");
					$("#td_adresse_2").css("visibility","hidden");
					$("#ville").css("visibility","hidden");
					$("#code_p").css("visibility","hidden");
					$("#pays").css("visibility","hidden");
					$("#num").css("visibility","hidden");
					<?php 
						if($code_p_vide==1){
							echo '$("#code_p_vide").css("visibility","hidden");';
						}
						if($adresse_vide==1){
							echo '$("#adresse_vide").css("visibility","hidden");';
						}
						if($ville_vide==1){
							echo '$("#ville_vide").css("visibility","hidden");';
						}
						if($num_vide==1){
							echo '$("#num_vide").css("visibility","hidden");';
						}
					 ?>
				}	
			}));
			if( $("#choix_vendeur").is($(":checked"))  ){
				$("#photo_profil").css("visibility","visible");
				$("#image_fond").css("visibility","visible");
				$("#pseudo").css("visibility","visible");	
				<?php  
					if($photo_profil_vide==1){
						echo '$("#pas_de_photo").css("visibility","visible");';
					}
					if($fond_vide==1){
						echo '$("#pas_de_fond").css("visibility","visible");';
					}
					if($pseudo_vide==1){
						echo '$("#pseudo_vide").css("visibility","visible");';
					}
					if($erreur_pseudo==1){
						echo '$("#pseudo_prit").css("visibility","visible");';
					}
				?>			
			}
			if( $("#choix_acheteur").is($(":checked"))  ){
				$("#adresse_1").css("visibility","visible");
				$("#td_adresse_2").css("visibility","visible");
				$("#ville").css("visibility","visible");
				$("#code_p").css("visibility","visible");
				$("#pays").css("visibility","visible");
				$("#num").css("visibility","visible");	
					<?php 
						if($code_p_vide==1){
							echo '$("#code_p_vide").css("visibility","visible");';
						}
						if($adresse_vide==1){
							echo '$("#adresse_vide").css("visibility","visible");';
						}
						if($ville_vide==1){
							echo '$("#ville_vide").css("visibility","visible");';
						}
						if($num_vide==1){
							echo '$("#num_vide").css("visibility","visible");';
						}
					 ?>			
		}
		});
	</script>




	<form action="Verification_compte.php" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td>
					<input type="text" name="email" placeholder="Votre adresse mail"/>
				</td>
				<?php 
					if($mail_vide==1){
						echo '<td><div id="email_vide">Veuillez saisir votre adresse email</div></td>';
					}
					if($erreur_mail==1){
						echo '<td><div id="email_vide">Cette adresse email est déjà utilisé, veuillez en saisir une autre</div></td>';
					}
				 ?>									
			</tr>
			<tr>
				<td>
					<input type="text" name="nom"  placeholder="Nom"/>
				</td>
				<?php 
					if($nom_vide==1){
						echo '<td><div id="nom_vide">Veuillez saisir votre nom</div></td>';
					}
				 ?>
			</tr>
			<tr>
				<td>
					<input type="text" name="prenom" placeholder="Prénom"/>
				</td>
				<?php 
					if($prenom_vide==1){
						echo '<td><div id="prenom_vide">Veuillez saisir votre prenom</div></td>';
					}
				 ?>
			</tr>
			<tr>
				<td>
					<input type="password" name="mdp" placeholder="Mot de passe"/>
				</td>
				<?php 
					if($mdp_vide==1){
						echo '<td><div id="mdp_vide">Veuillez saisir un mot de passe</div></td>';
					}
				 ?>
			</tr>
			<tr>
				<td>
					<input type="password" name="confirm_mdp" placeholder="Veuillez confirmer votre mot de passe"/>
				</td>
				<?php 
					if($confirm_mdp_vide==1){
						echo '<td><div id="confirm_mdp_vide">Veuillez confirmer votre mot de passe</div></td>';
					}
					if($erreur_confirm_mdp==1){
						echo '<td><div id="confirm_mdp_vide">Les mot de passes doivent être identiques</div></td>';
					}			
				 ?>
			</tr>
			<tr>
				<td>
					<?php 
						if (isset($_POST["choix_vendeur"])) {
							
							echo 'Souhaitez-vous vendre des produits <input type="checkbox" name="choix_vendeur" id="choix_vendeur" checked "/>';
						}

					 ?>
				</td>
				<td>
					<?php 
						if (isset($_POST["choix_acheteur"])) {
							
							echo 'Souhaitez-vous acheter des produits <input type="checkbox" name="choix_acheteur" id="choix_acheteur" checked "/>';
						}
					 ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php 
					
						if (isset($_POST["choix_vendeur"])) {
							
							echo '<input type="file" accept="image/png,image/jpeg" id="photo_profil" name="photo_profil"/>';
							if($photo_profil_vide==1){
								echo '<td><div id="pas_de_photo">Veuillez ajouter une photo à votre profil</div></td>';
							}
						}

					 ?>
				</td>
			</tr>		
				<?php 
				
					if (isset($_POST["choix_vendeur"])) {
						
						echo '<td><input type="file" accept="image/png,image/jpeg" id="image_fond" name="image_fond"/></td>';
						if($fond_vide==1){
							echo '<td><div id="pas_de_fond">Veuillez ajouter une photo de fond pour votre page principale</div></td>';
						}
					}
					
				 ?>		
			</tr>
			<tr>
				<?php 				
					if (isset($_POST["choix_vendeur"])) {
						echo '<td><input type="text" name="pseudo" id="pseudo" placeholder="Pseudo"/></td>';
						if($pseudo_vide==1){
							echo '<td><div id="pseudo_vide">Choisissez un pseudo</div></td>';
						}
						if($erreur_pseudo==1){
							echo '<td><div id="pseudo_prit">Ce pseudo est déjà utilisé par un autre utilisateur, veuillez en choisir un autre</div></td>';
						}
					}
				 ?>
			</tr>
			<tr>
				<td>
					<?php 
					
						if (isset($_POST["choix_acheteur"])) {
							
							echo '<select name="pays" id="pays"><optgroup label="Afrique">
							<option value="afriqueDuSud">Afrique Du Sud</option>
							<option value="algerie">Algérie</option>
							<option value="angola">Angola</option>
							<option value="benin">Bénin</option>
							<option value="botswana">Botswana</option>
							<option value="burkina">Burkina</option>
							<option value="burundi">Burundi</option>
							<option value="cameroun">Cameroun</option>
							<option value="capVert">Cap-Vert</option>
							<option value="republiqueCentre-Africaine">République Centre-Africaine</option>
							<option value="comores">Comores</option>
							<option value="republiqueDemocratiqueDuCongo">République Démocratique Du Congo</option>
							<option value="congo">Congo</option>
							<option value="coteIvoire">Côte d_Ivoire</option>
							<option value="djibouti">Djibouti</option>
							<option value="egypte">Égypte</option>
							<option value="ethiopie">Éthiopie</option>
							<option value="erythrée">Érythrée</option>
							<option value="gabon">Gabon</option>
							<option value="gambie">Gambie</option>
							<option value="ghana">Ghana</option>
							<option value="guinee">Guinée</option>
							<option value="guinee-Bisseau">Guinée-Bisseau</option>
							<option value="guineeEquatoriale">Guinée Équatoriale</option>
							<option value="kenya">Kenya</option>
							<option value="lesotho">Lesotho</option>
							<option value="liberia">Liberia</option>
							<option value="libye">Libye</option>
							<option value="madagascar">Madagascar</option>
							<option value="malawi">Malawi</option>
							<option value="mali">Mali</option>
							<option value="maroc">Maroc</option>
							<option value="maurice">Maurice</option>
							<option value="mauritanie">Mauritanie</option>
							<option value="mozambique">Mozambique</option>
							<option value="namibie">Namibie</option>
							<option value="niger">Niger</option>
							<option value="nigeria">Nigeria</option>
							<option value="ouganda">Ouganda</option>
							<option value="rwanda">Rwanda</option>
							<option value="saoTomeEtPrincipe">Sao Tomé-et-Principe</option>
							<option value="senegal">Séngal</option>
							<option value="seychelles">Seychelles</option>
							<option value="sierra">Sierra</option>
							<option value="somalie">Somalie</option>
							<option value="soudan">Soudan</option>
							<option value="swaziland">Swaziland</option>
							<option value="tanzanie">Tanzanie</option>
							<option value="tchad">Tchad</option>
							<option value="togo">Togo</option>
							<option value="tunisie">Tunisie</option>
							<option value="zambie">Zambie</option>
							<option value="zimbabwe">Zimbabwe</option>
						</optgroup>
						<optgroup label="Amérique">
							<option value="antiguaEtBarbuda">Antigua-et-Barbuda</option>
							<option value="argentine">Argentine</option>
							<option value="bahamas">Bahamas</option>
							<option value="barbade">Barbade</option>
							<option value="belize">Belize</option>
							<option value="bolivie">Bolivie</option>
							<option value="bresil">Brésil</option>
							<option value="canada">Canada</option>
							<option value="chili">Chili</option>
							<option value="colombie">Colombie</option>
							<option value="costaRica">Costa Rica</option>
							<option value="cuba">Cuba</option>
							<option value="republiqueDominicaine">République Dominicaine</option>
							<option value="dominique">Dominique</option>
							<option value="equateur">Équateur</option>
							<option value="etatsUnis">États Unis</option>
							<option value="grenade">Grenade</option>
							<option value="guatemala">Guatemala</option>
							<option value="guyana">Guyana</option>
							<option value="haiti">Haïti</option>
							<option value="honduras">Honduras</option>
							<option value="jamaique">Jamaïque</option>
							<option value="mexique">Mexique</option>
							<option value="nicaragua">Nicaragua</option>
							<option value="panama">Panama</option>
							<option value="paraguay">Paraguay</option>
							<option value="perou">Pérou</option>
							<option value="saintCristopheEtNieves">Saint-Cristophe-et-Niévès</option>
							<option value="sainteLucie">Sainte-Lucie</option>
							<option value="saintVincentEtLesGrenadines">Saint-Vincent-et-les-Grenadines</option>
							<option value="salvador">Salvador</option>
							<option value="suriname">Suriname</option>
							<option value="triniteEtTobago">Trinité-et-Tobago</option>
							<option value="uruguay">Uruguay</option>
							<option value="venezuela">Venezuela</option>
						</optgroup>
						<optgroup label="Asie">
							<option value="afghanistan">Afghanistan</option>
							<option value="arabieSaoudite">Arabie Saoudite</option>
							<option value="armenie">Arménie</option>
							<option value="azerbaidjan">Azerbaïdjan</option>
							<option value="bahrein">Bahreïn</option>
							<option value="bangladesh">Bangladesh</option>
							<option value="bhoutan">Bhoutan</option>
							<option value="birmanie">Birmanie</option>
							<option value="brunei">Brunéi</option>
							<option value="cambodge">Cambodge</option>
							<option value="chine">Chine</option>
							<option value="coreeDuSud">Corée Du Sud</option>
							<option value="coreeDuNord">Corée Du Nord</option>
							<option value="emiratsArabeUnis">Émirats Arabe Unis</option>
							<option value="georgie">Géorgie</option>
							<option value="inde">Inde</option>
							<option value="indonesie">Indonésie</option>
							<option value="iraq">Iraq</option>
							<option value="iran">Iran</option>
							<option value="israel">Israël</option>
							<option value="japon">Japon</option>
							<option value="jordanie">Jordanie</option>
							<option value="kazakhstan">Kazakhstan</option>
							<option value="kirghistan">Kirghistan</option>
							<option value="koweit">Koweït</option>
							<option value="laos">Laos</option>
							<option value="liban">Liban</option>
							<option value="malaisie">Malaisie</option>
							<option value="maldives">Maldives</option>
							<option value="mongolie">Mongolie</option>
							<option value="nepal">Népal</option>
							<option value="oman">Oman</option>
							<option value="ouzbekistan">Ouzbékistan</option>
							<option value="pakistan">Pakistan</option>
							<option value="philippines">Philippines</option>
							<option value="qatar">Qatar</option>
							<option value="singapour">Singapour</option>
							<option value="sriLanka">Sri Lanka</option>
							<option value="syrie">Syrie</option>
							<option value="tadjikistan">Tadjikistan</option>
							<option value="taiwan">Taïwan</option>
							<option value="thailande">Thaïlande</option>
							<option value="timorOriental">Timor oriental</option>
							<option value="turkmenistan">Turkménistan</option>
							<option value="turquie">Turquie</option>
							<option value="vietNam">Viêt Nam</option>
							<option value="yemen">Yemen</option>
						</optgroup>
						<optgroup label="Europe">
							<option value="allemagne">Allemagne</option>
							<option value="albanie">Albanie</option>
							<option value="andorre">Andorre</option>
							<option value="autriche">Autriche</option>
							<option value="bielorussie">Biélorussie</option>
							<option value="belgique">Belgique</option>
							<option value="bosnieHerzegovine">Bosnie-Herzégovine</option>
							<option value="bulgarie">Bulgarie</option>
							<option value="croatie">Croatie</option>
							<option value="danemark">Danemark</option>
							<option value="espagne">Espagne</option>
							<option value="estonie">Estonie</option>
							<option value="finlande">Finlande</option>
							<option value="france">France</option>
							<option value="grece">Grèce</option>
							<option value="hongrie">Hongrie</option>
							<option value="irlande">Irlande</option>
							<option value="islande">Islande</option>
							<option value="italie">Italie</option>
							<option value="lettonie">Lettonie</option>
							<option value="liechtenstein">Liechtenstein</option>
							<option value="lituanie">Lituanie</option>
							<option value="luxembourg">Luxembourg</option>
							<option value="exRepubliqueYougoslaveDeMacedoine">Ex-République Yougoslave de Macédoine</option>
							<option value="malte">Malte</option>
							<option value="moldavie">Moldavie</option>
							<option value="monaco">Monaco</option>
							<option value="norvege">Norvège</option>
							<option value="paysBas">Pays-Bas</option>
							<option value="pologne">Pologne</option>
							<option value="portugal">Portugal</option>
							<option value="roumanie">Roumanie</option>
							<option value="royaumeUni">Royaume-Uni</option>
							<option value="russie">Russie</option>
							<option value="saintMarin">Saint-Marin</option>
							<option value="serbieEtMontenegro">Serbie-et-Monténégro</option>
							<option value="slovaquie">Slovaquie</option>
							<option value="slovenie">Slovénie</option>
							<option value="suede">Suède</option>
							<option value="suisse">Suisse</option>
							<option value="republiqueTcheque">République Tchèque</option>
							<option value="ukraine">Ukraine</option>
							<option value="vatican">Vatican</option>
						</optgroup>
						<optgroup label="Océanie">
							<option value="australie">Australie</option>
							<option value="fidji">Fidji</option>
							<option value="kiribati">Kiribati</option>
							<option value="marshall">Marshall</option>
							<option value="micronesie">Micronésie</option>
							<option value="nauru">Nauru</option>
							<option value="nouvelleZelande">Nouvelle-Zélande</option>
							<option value="palaos">Palaos</option>
							<option value="papouasieNouvelleGuinee">Papouasie-Nouvelle-Guinée</option>
							<option value="salomon">Salomon</option>
							<option value="samoa">Samoa</option>
							<option value="tonga">Tonga</option>
							<option value="tuvalu">Tuvalu</option>
							<option value="vanuatu">Vanuatu</option>
						</optgroup>
					</select>';
						}
						
					 ?>
				</td>
			</tr>
			<tr>
				<?php 
				
					if (isset($_POST["choix_acheteur"])) {
						

						echo '<td><input type="number" id="code_p" name="code_p" placeholder="Code postal"/></td>';
						if($code_p_vide==1){
							echo '<td><div id="code_p_vide">Veuillez entrer votre code postal</div></td>';
						}
					}
					
				 ?>			
			</tr>
			<tr>
				<?php 
				
					if (isset($_POST["choix_acheteur"])) {
						
						echo '<td><input type="text" name="adresse_1" id="adresse_1" placeholder="Adresse numéro 1"/></td>';
						if($adresse_vide==1){
							echo '<td><div id="adresse_vide">Veuillez renseigner votre adresse</div></td>';
						}
					}
				
				 ?>
			</tr>
			<tr>
				<?php 
				
					if (isset($_POST["choix_acheteur"])) {
						
						echo '<td id="td_adresse_2"><input type="text" name="adresse_2" id="adresse_2" placeholder="Adresse numéro 2"/>(Facultatif)</td>';
					}
					
				 ?>
			</tr>
			<tr>
				<?php
				
					if (isset($_POST["choix_acheteur"])) {
						
						echo '<td><input type="text" name="ville" id="ville" placeholder="Ville"/></td>';
						if($ville_vide==1){
							echo '<td><div id="ville_vide">Veuillez renseigner votre ville</div></td>';
						}
					}
					
				 ?>
			</tr>
			<tr>
				<?php 
				
					if (isset($_POST["choix_acheteur"])) {

						echo '<td><input type="tel" name="num" id="num" placeholder="Numéro de téléphone"/></td>';
						if($num_vide==1){
							echo '<td><div id="num_vide">Veuillez indiquer votre numéro de téléphone</div></td>';
						}
					}
				
				?>		
			</tr>
		</table>
		<input type="submit" value="Valider" name="valider" />
	</form>
</body>
</html>