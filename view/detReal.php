 <?php
  ob_start();
  $real = $requete1->fetch();
  ?> <!--Début de la vue -->

 <section class="sec">
   <div class="part1">
     <div class="infos">
       <p><?= $real["name_real"] ?></p>
       <p>Né(e) le <?= $real["birth_date"] ?></p>
     </div>
     <div class="imgContain">
       <img class="img_pers" src="<?= $real["photo"] ?>" alt="Photo de  . $real['photo']" />
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
           <p><a href="index.php?action=detReal&id=<?= $info["id_film"] ?>"><?= $info["titre"] ?></a></p>
           <p><?= $info["tous_genre"] ?></p>
           <p class="imgContain"><img class="img_aff" src="<?= $info["affiche"] ?>" alt="Affiche du film . $info['titre']" /></p>
         </div>
       <?php } ?>
       <?php

        $titre = "<h1 class='titreH1'>Filmographie de " . $real["name_real"] . "</h1>";
        $contenu = ob_get_clean(); //Fin de la vue 
        require "view/template.php";

        ?>

       <!--Entre les 2 ob sera contenu dans $contenu -->
       <!-- tjs donner valeur a $titre -> <title>$titre</title> -->
       <!-- tjs donner valeur a $titre_sec -> <h2>$titre_sec</h2> -->
       <!-- tjs donner valeur a $contenu ->  $contenu  -->