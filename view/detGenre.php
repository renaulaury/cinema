 <?php
   ob_start();
   ?> <!--Début de la vue -->


 <div>Info filmographie</div>
 <?php
   foreach ($requete->fetchAll() as $film) { ?>
    <p><a href="index.php?action=detFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></p>
    <img class="img_aff" src="<?= $film["affiche"] ?>" alt="Affiche du film . $film['titre']" />

 <?php } ?>
 <?php

   $titre = "Genre : ";
   $contenu = ob_get_clean(); //Fin de la vue 
   require "view/template.php";

   ?>

 <!--Entre les 2 ob sera contenu dans $contenu -->
 <!-- tjs donner valeur a $titre -> <title>$titre</title> -->
 <!-- tjs donner valeur a $titre_sec -> <h2>$titre_sec</h2> -->
 <!-- tjs donner valeur a $contenu ->  $contenu  -->