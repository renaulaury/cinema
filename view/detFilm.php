 <?php 
    ob_start();
    $film = $requete1->fetch(); //a regrouper avec real
    $real = $requete2->fetch();

 ?> 

    <div>infos film</div>
    <p><?= $film["titre"] ?> </p>
    <p><?= $film["release_date"] ?> </p>
    <p><?= $film["timing"] ?> </p>
    <p><?= $film["affiche"] ?> </p>
    <p><?= $film["synopsis"] ?> </p>

    <div>infos real</div>
    <p><a href="index.php?action=detReal&id=<?= $real["id_realisateur"] ?>"><?= $real["name_real"] ?></a></p>
    <p><?= $real["birth_date"] ?> </p>

    <div>infos acteurs</div>
    <?php
    foreach ($requete3->fetchAll() as $actor) { ?>
        <p><a href="index.php?action=detActeur&id=<?= $actor["id_acteur"] ?>"><?= $actor["name_actor"] ?></a> </p>
        <p><a href="index.php?action=detRole&id=<?= $actor["id_role"] ?>"><?= $actor["personnage"] ?></a> </p>
    <?php } ?>
    
 <?php

    $titre = "Détail du film";
    $contenu = ob_get_clean(); //Fin de la vue 
    require "view/template.php";

    ?>

 <!--Entre les 2 ob sera contenu dans $contenu -->
 <!-- tjs donner valeur a $titre -> <title>$titre</title> -->
 <!-- tjs donner valeur a $titre_sec -> <h2>$titre_sec</h2> -->
 <!-- tjs donner valeur a $contenu ->  $contenu  -->