<?php ob_start() ?> <!--Début de la vue -->

<div class="intro">
        <p>Il y a <?= $requete->rowCount() ?> acteurs.</p>
        <div class="group_btn">
                <button onclick="window.location.href='index.php?action=addActeur';">Ajouter un acteur</button>
        </div>
</div>

<section class="princ">
        <?php
        foreach ($requete->fetchAll() as $actor) { ?>
                <div class="group">
                        <div class="text">
                                <p>
                                        <a href="index.php?action=detActeur&id=<?= $actor["id_acteur"] ?>"><?= $actor["name_actor"] ?></a>
                                </p>
                        </div>
                        <p class="imgContain">
                                <img class="img_pers" src="<?= $actor["photo"] ?>" alt="Photo de  . $actor['photo']" />
                        </p>
                </div>
        <?php } ?>


        <?php

        $titre = "<h1 class='titreH1'>Liste des acteurs</h1>";
        $contenu = ob_get_clean(); //Fin de la vue 
        require "view/template.php";

        ?>