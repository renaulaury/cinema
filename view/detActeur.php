 <?php
   ob_start();
   $actor = $requete1->fetch();
   ?> <!--Début de la vue -->

 <section class="sec">
    <div class="part1">
       <div class="infos">
          <p><?= $actor["name_acteur"] ?></p>
          <p>Né(e) le <?= $actor["birth_date"] ?></p>
       </div>
       <div>
          <img class="img_pers" src="<?= $actor["photo"] ?>" alt="Photo de  . $actor['photo']" />
       </div>
    </div>
 </section>


 <section>
    <h2>Filmographie</h2>

    <div class="contain">
       <div class="secQuart">
          <?php
            foreach ($requete2->fetchAll() as $info) { ?>
             <div class="groupInfo">
                <p><a href="index.php?action=detFilm&id=<?= $info["id_film"] ?>"><?= $info["titre"] ?></a></p>
                <p class="imgContain"><img class="img_aff" src="<?= $info["affiche"] ?>" alt="Affiche du film : <?= $info['titre'] ?>" /></p>

             </div>

             <p>--------- ></p>

             <div class="groupInfo">
                <p><a href="index.php?action=detRole&id=<?= $info["id_role"] ?>"><?= $info["personnage"] ?></a> </p>
                <p class="imgContain"><img class="img_pers" src="<?= $info['photo'] ?>" alt="Photo du personnage : <?= $info['personnage'] ?>" /></p>
             </div>
          <?php } ?>
       </div>
    </div>
 </section>


 <?php

   $titre = "<h1 class='titreH1'>Filmographie de " . $actor["name_acteur"] . "</h1>";
   $contenu = ob_get_clean(); //Fin de la vue 
   require "view/template.php";

   ?>

 <!--Entre les 2 ob sera contenu dans $contenu -->
 <!-- tjs donner valeur a $titre -> <title>$titre</title> -->
 <!-- tjs donner valeur a $titre_sec -> <h2>$titre_sec</h2> -->
 <!-- tjs donner valeur a $contenu ->  $contenu  -->