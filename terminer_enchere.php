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

$enchere_gagnante=0;
$enchere_deuxieme=0;

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$rep = $bdd->query("SELECT * FROM article WHERE Type_vente2=1 " );

        while ($donnees = $rep->fetch())
        {
            $article=$donnees['ID_article'];
            $date_fin=$donnees['Date_fin'];
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
           
            $rep2 = $bdd->query("SELECT * FROM proposer_enchere WHERE ID_article=$article");
            while ($valeur = $rep2->fetch()){
                if($enchere_gagnante<$valeur['Prix_donne']){
                    $enchere_gagnante=$valeur['Prix_donne'];
                }

            }
            $rep2 -> closeCursor();

            $rep3 = $bdd->query("SELECT * FROM proposer_enchere WHERE ID_article=$article AND Prix_donne!='$enchere_gagnante'" );
            while ($fct = $rep3->fetch()){
                if($enchere_deuxieme<$fct['Prix_donne']){
                    $enchere_deuxieme=$fct['Prix_donne'];
                }
            }
            $rep3 -> closeCursor(); 

            $rep4 = $bdd->query("SELECT * FROM proposer_enchere WHERE Prix_donne='$enchere_gagnante'");
            while ($or = $rep4->fetch()){
                $gagnant=$or['ID_acheteur'];
            }
            $rep4 -> closeCursor();

            $rep5 = $bdd->query("SELECT * FROM acheteur WHERE ID_acheteur='$gagnant'" );
            while ($ola = $rep5->fetch()){
                $nom_gagnant=$ola['Nom_acheteur'];
                $prenom_gagnant=$ola['Prenom_acheteur'];
                $email_gagnant=$ola['Email_ECE'];
            }

            ?>
                <p> Actuellement : </p><br>
                <p> L'offre qui remporte l'enchere est : <?php echo $enchere_gagnante; ?>€</p>
                <p> L'offre qui vient juste après est : <?php echo $enchere_deuxieme; ?>€</p>
                <p> Donc l'acheteur <?php echo "$nom_gagnant" ." ". "$prenom_gagnant";?>  remporte l'enchère avec : <?php echo $enchere_deuxieme+1; ?>€</p>
                <p> L'enchère se termine le : <?php echo "$date_fin";?> .</p>

                <a href="prevenir_gagnant_enchere.php?acheteur=<?php echo $gagnant; ?>&amp;article=<?php echo $article; ?>&amp;prix=<?php echo $enchere_deuxieme+1; ?>">
                <input type="button" name="prevenir_gagnant" value="Terminer l'enchère et envoyer un mail au gagnant de l'enchère" />
                </a>
                </div>
            </div>

            <?php
        ?>
            
        <?php
        }

        $rep->closeCursor(); // Termine le traitement de la requête
        ?>
        
        <a href="menuadmin.php?email=adminsite@edu.ece.fr"> Revenir au menu admin </a> <?php// echo $_GET['email']; ?>