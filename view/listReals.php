<?php ob_start() ?> <!--Début de la vue -->

<div class="intro">
        <p>Il y a <?= $requete->rowCount() ?> réalisateurs.</p>
        <div class="group_btn">
                <button onclick="window.location.href='index.php?action=addReal';">Ajouter un réalisateur</button>
        </div>
</div>

<section class="princ">
        <?php
        foreach ($requete->fetchAll() as $real) { ?>
                <div class="group">
                        <div class="text">
                                <p><a href="index.php?action=detReal&id=<?= $real["id_realisateur"] ?>"><?= $real["name_real"] ?></a></p>
                        </div>
                        <p><img class="img_pers" src="<?= $real["photo"] ?>" alt="Photo de  . $real['photo']" /></p>
                </div>
        <?php } ?>
        </section>



<?php

$titre = "Liste des réalisateurs";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>