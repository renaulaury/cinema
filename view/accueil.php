<?php
ob_start();

?> <!--Début de la vue -->

<!-- <p><img src="./public/img/image_princ.jpg" alt="Image principale" /></p>  -->
<h1>Accueil</h1>

<section>
    <h2>Films</h2>
    <div>
        <?php
        
            foreach ($requete->fetchAll() as $info) { ?>
                <a href="index.php?action=detFilm&id=<?= $info['id_film'] ?>"><?= $info["titre"] ?></a></p>
                <p><img src="<?= $info["affiche"] ?>" alt="Affiche du film . $info['titre']" /></p>   
            <?php } ?>
        <p><a href="index.php?action=listFilms">>Voir plus</a> </p>
    </div>
</section>

<section>
    <h2>Réalisateurs</h2>
    <div>
        <?php
        foreach ($requete2->fetchAll() as $info) { ?>
            <a href="index.php?action=detReal&id=<?= $info["id_realisateur"] ?>"><?= $info["name_real"] ?></a></p>
            <img src="<?= $info["photo"] ?>" alt="Photo de  . $info['photo']" />
        <?php } ?>

        <p><a href="index.php?action=listReals">>Voir plus</a></p>
    </div>
</section>

<section>
    <h2>Acteurs</h2>
    <div>
        <?php
        foreach ($requete3->fetchAll() as $info) { ?>
            <a href="index.php?action=detActeur&id=<?= $info["id_acteur"] ?>"><?= $info["name_acteur"] ?></a></p>
            <img src="<?= $info["photo"] ?>" alt="Photo de  . $info['photo']" />
        <?php } ?>

        <p><a href="index.php?action=listActeurs">>Voir plus</a></p>
    </div>

</section>

<?php

$titre = "";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>