<?php ob_start() ?> <!--Début de la vue -->

<p>Il y a <?= $requete->rowCount() ?> réalisateurs.</p>


        <?php
        foreach ($requete->fetchAll() as $real) { ?>
                <a href="index.php?action=detReal&id=<?= $real["id_realisateur"] ?>"><?= $real["name_real"] ?></a></p>
                     
        <?php } ?>


<?php

$titre = "Liste des réalisateurs";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>