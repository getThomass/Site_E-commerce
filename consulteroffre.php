<center><h1>Nouvelles offres</h1></center>
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
///$dateactuelle=date('Y-m-d');

$email=$_GET['email'];
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$rep = $bdd->query("SELECT * FROM vendeur WHERE Email_ECE='$email'");

        while ($fir = $rep->fetch())
        {
            $vendeur=$fir['ID_vendeur'];
        }
        $rep -> closeCursor();

$reponse = $bdd->query("SELECT * FROM article WHERE ID_vendeur='$vendeur'");

while ($pull = $reponse->fetch())
{
    $article=$pull['ID_article'];

    $rep2 = $bdd->query("SELECT * FROM negocier WHERE ID_article='$article'" );

        while ($sec = $rep2->fetch())
        {


                $rep3 = $bdd->query("SELECT * FROM article WHERE ID_article='$article'" );

                    while ($donnees = $rep3->fetch())
                    {
                        ?>
                        <div class="container">
                            <div class="col-md-4">
                                <p>
                                <tr>
                                    <td><?php echo $donnees['Nom_article']; ?></td><br>
                                    <td></td>
                                    <td> Prix fixé = <?php echo $donnees['Prix']; ?> euros !</td><br>
                                </tr>
                                <tr>
                                    <td><?php echo '<img src="Photo_article/' . $donnees["lien_photo_item"] . '" height="200"; width="200";>';?></td><br>
                                    <td> Descrition = <?php echo $donnees['Description']; ?></td><br>
                                </tr>
                                
                            </p>
                            
                        <?php
                    }
                $rep3 -> closeCursor();

            $acheteur=$sec['ID_acheteur'];
            $compteur=$sec['Compteur'];

                $rep4 = $bdd->query("SELECT * FROM acheteur WHERE ID_acheteur='$acheteur'" );

                    while ($thir = $rep4->fetch())
                    {
                        $nom_acheteur=$thir['Nom_acheteur'];
                        $prenom_acheteur=$thir['Prenom_acheteur'];
                    }
                $rep4 -> closeCursor(); ?>



                    <p> Une offre de <?php echo $sec['Prix_final'];?>€ a été formulé par <?php echo $nom_acheteur.' '.$prenom_acheteur;?>. Il s'agit sa tentative <?php echo $compteur;?></p><br>
                    <a href="accepter_offre.php?email=<?php echo $email; ?>&amp;article=<?php echo $article; ?>&amp;acheteur=<?php echo $acheteur;?>">
                    <input type="button" value="Accepter l'offre de l'acheteur" />
                    </a>
                    <a href="proposer_contre_offre.php?email=<?php echo $email; ?>&amp;article=<?php echo $article; ?>&amp;acheteur=<?php echo $acheteur;?>">
                    <input type="button" value="Faire une contre-proposition au client" />
                    </a>
                </div>
            </div>
        <?php }    

    $rep2->closeCursor(); // Termine le traitement de la requête
        ?>
<?php
}
$reponse->closeCursor();
?>

        
<a href="menuvendeur.php?email=$email"> Revenir au menu vendeur </a> 