<?php ob_start() ?> <!--Début de la vue -->

<p>Il y a <?= $requete->rowCount() ?> roles.</p>


        <?php
        foreach ($requete->fetchAll() as $role) { ?>
                <a href="index.php?action=detRole&id=<?= $role["id_role"] ?>"><?= $role["personnage"] ?></a></p>
                     
        <?php } ?>


<?php

$titre = "Liste des genres";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>