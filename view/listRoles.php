<?php ob_start() ?> <!--Début de la vue -->

<div class="intro">
        <p>Il y a <?= $requete->rowCount() ?> roles.</p>
        <div class="group_btn">
                <button onclick="window.location.href='index.php?action=addRole';">Ajouter un rôle</button>
        </div>
</div>

<section class="princ">
        <?php
        foreach ($requete->fetchAll() as $role) { ?>
                <div class="group">
                        <div class="text">
                                <a href="index.php?action=detRole&id=<?= $role["id_role"] ?>"><?= $role["personnage"] ?></a></p>
                        </div>
                        <p class="imgContain"><img class="img_pers" src="<?= $role["photo"] ?>" alt="Photo de  . $role['photo']" /></p>
                </div>
        <?php } ?>


        <?php

        $titre = "<h1 class='titreH1'>Liste des rôles</h1>";
        $contenu = ob_get_clean(); //Fin de la vue 
        require "view/template.php";

        ?>