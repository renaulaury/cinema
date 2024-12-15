 <?php
  ob_start();
  $film = $requete1->fetch();
  ?>


 <section class="sec">
   <div class="part1">
     <div class="infos">
       <h1><?= $film['titre'] ?></h1>
       <p>
         <?php
          foreach ($requete2->fetchAll() as $genre) { ?>
       <p>
         <?= $genre["libelle_genre"] ?>
       </p>
     <?php } ?>
     </p>

     <p><?= $film["timing"] ?> </p>
     <p>Sortie en France le : <?= $film["release_date"] ?> </p>
     </div>

     <div>
       <img class="img_aff" src="<?= $film["affiche"] ?>" alt="Affiche du film . $film['titre']" />
     </div>
   </div>
 </section>


 <section class="sec secBis">
   <div class="part2">
     <h2>Synopsis</h2>
     <p><?= $film["synopsis"] ?> </p>
   </div>
 </section>


 <section class="sec">
   <h2>Réalisateur</h2>
   <div class="secTer">
     <div class="groupReal">
       <p><a href="index.php?action=detReal&id=<?= $film["id_realisateur"] ?>"><?= $film["name_real"] ?></a></p>
       <p class="imgContain"><img class="img_pers" src="<?= $film["photo"] ?>" alt="Photo de  . $film['photo']" /></p>
     </div>
   </div>
 </section>

 <section class="sec">
   <h2>Acteurs</h2>

   <div class="contain">
     <div class="secQuart">
       <?php
        foreach ($requete3->fetchAll() as $actor) { ?>
         <div class="acteurRole">
           <div class="groupInfo">
             <p><a href="index.php?action=detActeur&id=<?= $actor["id_acteur"] ?>"><?= $actor["name_actor"] ?></a> </p>
             <p class="imgContain"><img class="img_pers" src="<?= $actor["photoP"] ?>" alt="Photo de  . $actor['photo']" /></p>
           </div>

           <p>--------- ></p>

           <div class="groupInfo">
             <p><a href="index.php?action=detRole&id=<?= $actor["id_role"] ?>"><?= $actor["personnage"] ?></a> </p>
             <p class="imgContain"><img class="img_pers" src="<?= $actor["photoR"] ?>" alt="Photo de  . $actor['personnage']" /></p>
             <p>Image role</p>
           </div>
         </div>
       <?php } ?>
     </div>
   </div>
 </section>




 <?php

  $titre = "";
  $contenu = ob_get_clean(); //Fin de la vue 
  require "view/template.php";

  ?>

 <!--Entre les 2 ob sera contenu dans $contenu -->
 <!-- tjs donner valeur a $titre -> <title>$titre</title> -->
 <!-- tjs donner valeur a $titre_sec -> <h2>$titre_sec</h2> -->
 <!-- tjs donner valeur a $contenu ->  $contenu  -->