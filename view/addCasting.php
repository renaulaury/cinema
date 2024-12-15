<?php ob_start() ?> <!--Début de la vue -->


<form action="index.php?action=addCasting" method="post">
        <section class="formSec">
                <h2 class="addH2">Informations concernant le film</h2>

                <div class="listName">
                        <select>
                                <?php foreach ($req_film->fetchAll() as $film) { ?>
                                        <option value="<?= $film["id_film"] ?>"><?= $film["titre"] ?></option>
                                <?php } ?>
                        </select>
                </div>
        </section>

        <section class="formSec">
                <h2 class="addH2">Informations concernant les acteurs</h2>

                <div class="listName">
                        <select>
                                <?php foreach ($req_acteur->fetchAll() as $actor) { ?>
                                        <option value="<?= $actor["id_acteur"] ?>"><?= $actor["name_acteur"] ?></option>
                                <?php } ?>
                        </select>
                </div>
        </section>

        <section class="formSec">
                <h2 class="addH2">Informations concernant les acteurs</h2>

                <div class="listName">
                        <select>
                                <?php foreach ($req_role->fetchAll() as $role) { ?>
                                        <option value="<?= $role["id_role"] ?>"><?= $role["personnage"] ?></option>
                                <?php } ?>
                        </select>
                </div>
        </section>

        <div class="validation">
                <input class="validInput" type="submit" name="submit" value="Valider">
        </div>
</form>

<?php


$titre = "<h1 class='titreH1'>Ajout d'un casting</h1>";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>