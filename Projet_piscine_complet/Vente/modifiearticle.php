
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
$idarticle=$_GET['article'];
$email=$_GET['email'];

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
if(isset($_POST['type_1'])){
    $bdd->exec("UPDATE article SET Type_vente1='1' WHERE ID_article=$idarticle");
}else{
    $bdd->exec("UPDATE article SET Type_vente1=NULL WHERE ID_article=$idarticle");
}
if(isset($_POST['type_2'])){
    $bdd->exec("UPDATE article SET Type_vente2='1' WHERE ID_article=$idarticle");
}else{
    $bdd->exec("UPDATE article SET Type_vente2=NULL WHERE ID_article=$idarticle");
}
if(isset($_POST['type_3'])){
    $bdd->exec("UPDATE article SET Type_vente3='1' WHERE ID_article=$idarticle");
}else{
    $bdd->exec("UPDATE article SET Type_vente3=NULL WHERE ID_article=$idarticle");
}

 
$req = $bdd->prepare("UPDATE article SET Nom_article = :nvnom, Description = :nvdescription, Categorie= :nvcategorie, Prix = :nvprix WHERE ID_article =$idarticle ");
$req->execute(array(
    'nvnom' => $nom,
    'nvdescription' => $description,
    'nvcategorie' => $categorie,
    'nvprix' => $prix
    ));
$req->closeCursor();

$file = $_FILES["image"];
if($file!=NULL){
    move_uploaded_file($file["tmp_name"], "photos/" . $file["name"]);
    $nom_image = $_FILES["image"]["name"];
    $bdd->exec("UPDATE article SET lien_photo_item = '$nom_image' WHERE ID_article=$idarticle");
}




?>
La modification a bien été effectuée.
<a href="suivresesarticles.php?email=<?php echo $email;?>"> <input type="button" value="Revenir à mes annonces" /></a>