 <?php
    ob_start();
    $actor = $requete1->fetch();
    ?> <!--Début de la vue -->

 <div>Info acteur</div>

 <p><?= $actor["name_acteur"] ?></p>
 <p><?= $actor["birth_date"] ?></p>
 <img class="img_pers" src="<?= $actor["photo"] ?>" alt="Photo de  . $actor['photo']" />


 <div>Info filmographie</div>
 <?php
    foreach ($requete2->fetchAll() as $info) { ?>
     <p><a href="index.php?action=detFilm&id=<?= $info["id_film"] ?>"><?= $info["titre"] ?></a></p>
     <p><a href="index.php?action=detGenre&id=<?= $info["id_genre"] ?>"><?= $info["tous_genre"] ?></a></p>
     <p><?= $info["personnage"] ?></p>
     <p><img class="img_aff" src="<?= $info["affiche"] ?>" alt="Affiche du film . $film['titre']" /></p>
 <?php } ?>
 <?php

    $titre = "Filmographie de " . $actor["name_acteur"];
    $contenu = ob_get_clean(); //Fin de la vue 
    require "view/template.php";

    ?>

 <!--Entre les 2 ob sera contenu dans $contenu -->
 <!-- tjs donner valeur a $titre -> <title>$titre</title> -->
 <!-- tjs donner valeur a $titre_sec -> <h2>$titre_sec</h2> -->
 <!-- tjs donner valeur a $contenu ->  $contenu  -->