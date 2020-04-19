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
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$description = isset($_POST["description"])? $_POST["description"] : "";
$categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : "";
$date_fin = isset($_POST["date_fin_enchere"])? $_POST["date_fin_enchere"] : "";
$date_debut = date('Y-m-d');


if(isset($_POST['type_1'])){
    $bdd->exec('INSERT INTO article(Type_vente1) VALUES(\'1\')');
}
if(isset($_POST['type_2'])){
    $bdd->exec('INSERT INTO article(Type_vente2) VALUES(\'1\')');
}
if(isset($_POST['type_3'])){
    $bdd->exec('INSERT INTO article(Type_vente3) VALUES(\'1\')');
}



$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$result = $bdd->query(" SELECT * FROM vendeur WHERE Email_ECE='{$_GET['email']}'"); 
while($donnees=$result->fetch()){
    $vendeur=$donnees['ID_vendeur'];
}
$result->closeCursor();

$chemin=getcwd();

$name_photo=$_FILES["image"]["name"];
$tmp_photo=$_FILES["image"]["tmp_name"];
move_uploaded_file($tmp_photo,"Photo_article/".$name_photo);	
copy($chemin."\Photo_article\\".$name_photo,str_replace("Admin","Vente\\",$chemin)."Photo_article\\".$name_photo);
					



 ///permet de rechercher l'erreur lié à la base de donnée
$req = $bdd->prepare('INSERT INTO article(Nom_article, lien_photo_item, Description, Categorie, Prix, Date_debut, Date_fin, ID_vendeur) VALUES(:Nom_article, :lien_photo_item, :Description, :Categorie, :Prix, :Date_debut, :Date_fin, :ID_vendeur)');
$req->execute(array(
	'Nom_article' => $nom,
	'lien_photo_item' => $name_photo,
	'Description' => $description,
	'Categorie' => $categorie,
    'Prix' => $prix,
    'Date_debut' => $date_debut,
    'Date_fin' => $date_fin,
    'ID_vendeur' => $vendeur
    ));


///récupérer en plus l'ID du vendeur !!!!!!!!!!!!!!!!!


?>

<center><h2> L'article a bien été ajouté </h2></center>
<?php 
if($_GET['email']=='adminsite@edu.ece.fr'){ ?>
    <a href="menuadmin.php?email=<?php echo $_GET['email']; ?>"> Revenir au menu administrateur </a>
<?php
}else{ ?>
    <a href="menuvendeur.php?email=<?php echo $_GET['email']; ?>"> Revenir au menu vendeur </a>
<?php } ?>
