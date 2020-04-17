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

$reponse = $bdd->query("SELECT * FROM article" );

        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch())
        {
        ?>
            <div class="col-lg-4">
                <p>
                <tr>
                    <td><?php echo $donnees['Nom_article']; ?></td>
                    <td></td>
                    <td> Prix = <?php echo $donnees['Prix']; ?> euros !</td>
                </tr>
                <tr>
                    <td><?php echo '<img src="photos/' . $donnees["lien_photo_item"] . '" height="200"; width="200";>';?></td>
                    <td> Descrition = <?php echo $donnees['Description']; ?></td>
                </tr>
                <?php if($donnees['Type_vente1']!=NULL){ ?>
                    <input type="button" name="Type_vente1" value="L'article est en vente immédiate" style="background-color:red; color:black;" disabled />
                <?php
                }
                if($donnees['Type_vente2']!=NULL){ ?>
                    <input type="button" name="Type_vente2" value="L'article est en cours d'enchère" style="background-color:yellow; color:black;" disabled />
                <?php 
                }
                if($donnees['Type_vente3']!=NULL){ ?>
                    <input type="button" name="Type_vente3" value="L'article est en attente d'une meilleure offre" style="background-color:orange; color:black;" disabled />
                <?php  } ?>
                
            </p>
            </div>
        <?php
        }

        $reponse->closeCursor(); // Termine le traitement de la requête
    
        ?>