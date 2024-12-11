<?php ob_start() ?> <!--Début de la vue -->

<p>Il y a <?= $requete->rowCount() ?> acteurs.</p>



        <?php
        foreach ($requete->fetchAll() as $acteur) { ?>
      
                <p><a href="index.php?action=detActeur&id=<?= $acteur["id_acteur"] ?>"><?= $acteur["name_actor"] ?></a></p>
            
        <?php } ?>


<?php

$titre = "Liste des acteurs";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>