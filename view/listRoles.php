<?php ob_start() ?> <!--Début de la vue -->

<div class="intro">
        <p>Il y a <?= $requete->rowCount() ?> roles.</p>
        <div class="group_btn">
                <button onclick="window.location.href='index.php?action=addRole';">Ajouter un réalisateur</button>
        </div>
</div>

<section class="princ">
        <?php
        foreach ($requete->fetchAll() as $role) { ?>
        <div class="group">
                <div class="text">
                <a href="index.php?action=detRole&id=<?= $role["id_role"] ?>"><?= $role["personnage"] ?></a></p>
                </div>
                        <p>Image</p>
                </div>   
        <?php } ?>


<?php

$titre = "Liste des genres";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>