<?php ob_start() ?> <!--Début de la vue -->

<div class="intro">
        <p>Il y a <?= $requete->rowCount() ?> genres.</p>
        <div class="group_btn">
                <button onclick="window.location.href='index.php?action=addGenre';">Ajouter un genre</button>
        </div>
</div>

<section class="gpGenre">
        <?php
        foreach ($requete->fetchAll() as $genre) { ?>
                <div class="nomGenre">
                        <p><a class="genre" href="index.php?action=detGenre&id=<?= $genre["id_genre"] ?>"><?= $genre["libelle_genre"] ?></a></p>
                </div>
        <?php } ?>
</section>



<?php

$titre = "<h1 class='titreH1'>Liste des genres</h1>";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>