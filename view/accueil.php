<?php
ob_start();
$carrousel = $requete->fetch();
?> <!--Début de la vue -->

<div>
    <p>Carrousel</p>
    <p><?= $carrousel["titre"] ?></p>
    <p><?= $carrousel["release_date"] ?></p>
    <p><?= $carrousel["synopsis"] ?></p>
</div>


<section>
    <h2>Films</h2>
    <div>
        <?php
        foreach ($requete->fetchAll() as $info) { ?>
            <p><?= $info["titre"] ?></p>
            <p><?= $info["affiche"] ?></p>
        <?php } ?>

        <p><a href="index.php?action=listFilms">>Voir plus</a> </p>
    </div>
</section>

<section>
    <h2>Réalisateurs</h2>
    <div>
        <?php
        foreach ($requete2->fetchAll() as $info) { ?>
            <p><?= $info["name_real"] ?></p>
            <p><?= $info["photo"] ?></p>
        <?php } ?>

        <p><a href="index.php?action=listReals">>Voir plus</a></p>
    </div>

</section>


<?php

$titre = "";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>