 <?php
  ob_start();
  ?> <!--Début de la vue -->


 <section class="sec">
   <div class="part1">
     <div class="infos">
       <?php
        foreach ($requete->fetchAll() as $role) { ?>

         <h1><?= $role["personnage"] ?> </h1>
         <p>Interprété par : <a href=" index.php?action=detActeur&id=<?= $role["id_acteur"] ?>"><?= $role["name_actor"] ?></a>
     </div>

     <div>
       <p class="imgContain"><img class="img_pers" src="<?= $role['photo'] ?>" alt="Photo du personnage : <?= $role['personnage'] ?>" /></p>
     </div>
 </section>

 <section>
   <h2>Dans le film :</h2>
   <div class="part1">
     <div class="infos">
       <p><a href=" index.php?action=detFilm&id=<?= $role["id_film"] ?>"><?= $role["titre"] ?></a></p>
       <p><?= $role["tous_genre"] ?></p>
     </div>

     <p class="imgContain"><img class="img_aff" src="<?= $role["affiche"] ?>" alt="Affiche du film . $role['titre']" /></p>
   </div>
 </section>



 <?php } ?>



 <?php

  $titre = "";
  $contenu = ob_get_clean(); //Fin de la vue 
  require "view/template.php";

  ?>

 <!--Entre les 2 ob sera contenu dans $contenu -->
 <!-- tjs donner valeur a $titre -> <title>$titre</title> -->
 <!-- tjs donner valeur a $titre_sec -> <h2>$titre_sec</h2> -->
 <!-- tjs donner valeur a $contenu ->  $contenu  -->