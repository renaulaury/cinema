<?php ob_start() ?> <!--Début de la vue -->

<p>Il y a <?= $requete->rowCount() ?> genres.</p>


        <?php
        foreach ($requete->fetchAll() as $genre) { ?>
                <a href="index.php?action=detGenre&id=<?= $genre["id_genre"] ?>"><?= $genre["libelle_genre"] ?></a></p>
                     
        <?php } ?>


<?php

$titre = "Liste des genres";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>