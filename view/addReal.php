<?php ob_start() ?> <!--Début de la vue -->


        <form action="index.php?action=addReal" method="post">
                <p>
                        <label for="name_real">Nom :</label>
                        <input type="text" id="name_real" name="name_real"></input>
                </p>
                <p>
                        <label for="firstname_real">Prénom :</label>
                        <input type="text" id="firstname_real" name="firstname_real"></input>
                </p>
                <p>
                        <label for="sexe_real">Sexe :</label>
                        <label for="sexe_F">Femme</label>
                        <input type="radio" id="sexe_F" name="sexe" value="F"  />
                        <label for="huey">Homme</label>               
                        <input type="radio" id="sexe_M" name="sexe" value="M" />        
                </p>
                <p>
                        <label for="ddn_real">Date de naissance :</label>
                        <input type="date" id="ddn_real" name="ddn_real" placeholder="AAAAMMJJ"></input>
                </p>
                <p>
                        <label for="url_real">Url du réalisateur :</label>
                        <input type="text" id="url_real" name="url_real"></input>
                </p>

                <input type="submit" name="submit" value="Valider">
        </form>

<?php


$titre = "Ajout d'un réalisateur";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>