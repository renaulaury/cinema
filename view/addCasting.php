<?php ob_start() ?> <!--Début de la vue -->


        <form action="index.php?action=addCasting" method="post">
                
                <p>Informations concernant le film</p>
                        
                        <select name="liste_film">
                                <?php foreach ($req_film->fetchAll() as $film) { ?>
                                <option value="<?= $film["id_film"] ?>"><?= $film["titre"] ?></option>
                        <?php } ?>
                        </select>
                        

                <p>Informations concernant les acteurs</p>

                        <select name="liste_acteur">
                                <?php foreach ($req_acteur->fetchAll() as $actor) { ?>
                                <option value="<?= $actor["id_acteur"] ?>"><?= $actor["name_acteur"] ?></option>
                        <?php } ?>
                        </select>

                <p>Informations concernant les acteurs</p>

                        <select name="liste_role">
                                <?php foreach ($req_role->fetchAll() as $role) { ?>
                                <option value="<?= $role["id_role"] ?>"><?= $role["personnage"] ?></option>
                        <?php } ?>
                        </select>


                <input type="submit" name="submit" value="Valider">
        </form>

<?php


$titre = "<h1 class='titreH1'>Ajout d'un casting</h1>";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>