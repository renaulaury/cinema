<?php
ob_start();

?> <!--Début de la vue -->

<!-- <p><img src="./public/img/image_princ.jpg" alt="Image principale" /></p>  -->


<section class="section_acc">
    <h2 class="titre_acc">Films</h2>
    <div class="acc">
        <?php
        foreach ($requete->fetchAll() as $info) { ?>
            <div class="acc_group">
                <a href="index.php?action=detFilm&id=<?= $info['id_film'] ?>"><?= $info["titre"] ?></a>
                <p class="imgContain"><img class="img_aff" src="<?= $info["affiche"] ?>" alt="Affiche du film . $info['titre']" /></p>
            </div>
        <?php } ?>
    </div>

    <p><a href="index.php?action=listFilms">>Voir plus</a> </p>
</section>

<section class="section_acc">
    <h2 class="titre_acc">Réalisateurs</h2>
    <div class="acc">
        <?php
        foreach ($requete2->fetchAll() as $info) { ?>
            <div class="acc_group">
                <a href="index.php?action=detReal&id=<?= $info["id_realisateur"] ?>"><?= $info["name_real"] ?></a>
                <p class="imgContain"><img class="img_pers" src="<?= $info["photo"] ?>" alt="Photo de  . $info['photo']" /></p>
            </div>
        <?php } ?>
    </div>
    <p><a href="index.php?action=listReals">>Voir plus</a></p>

</section>

<section class="section_acc">
    <h2 class="titre_acc">Acteurs</h2>
    <div class="acc">
        <?php
        foreach ($requete3->fetchAll() as $info) { ?>
            <div class="acc_group">
                <a href="index.php?action=detActeur&id=<?= $info["id_acteur"] ?>"><?= $info["name_acteur"] ?></a>
                <p class="imgContain"><img class="img_pers" src="<?= $info["photo"] ?>" alt="Photo de  . $info['photo']" /></p>
            </div>
        <?php } ?>
    </div>

    <p><a href="index.php?action=listActeurs">>Voir plus</a></p>


</section>

<?php

$titre = "<h1 class='titreH1'>Accueil</h1>";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>