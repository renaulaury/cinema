 <?php
   ob_start();
   $real = $requete1->fetch();
   ?> <!--Début de la vue -->

 <div>Info real</div>

 <p><?= $real["name_real"] ?></p>
 <p><?= $real["birth_date"] ?></p>
 <img class="img_pers" src="<?= $real["photo"] ?>" alt="Photo de  . $real['photo']" />

 <div>Info filmographie</div>
 <?php
   foreach ($requete2->fetchAll() as $info) { ?>
    <p><a href="index.php?action=detReal&id=<?= $info["id_film"] ?>"><?= $info["titre"] ?></a></p>
    <p><a href="index.php?action=detReal&id=<?= $info["id_genre"] ?>"><?= $info["tous_genre"] ?></a></p>
    <p><img class="img_aff" src="<?= $info["affiche"] ?>" alt="Affiche du film . $info['titre']" /></p>
 <?php } ?>
 <?php

   $titre = "Filmographie de " . $real["name_real"];
   $contenu = ob_get_clean(); //Fin de la vue 
   require "view/template.php";

   ?>

 <!--Entre les 2 ob sera contenu dans $contenu -->
 <!-- tjs donner valeur a $titre -> <title>$titre</title> -->
 <!-- tjs donner valeur a $titre_sec -> <h2>$titre_sec</h2> -->
 <!-- tjs donner valeur a $contenu ->  $contenu  -->