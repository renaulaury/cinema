 <?php
  ob_start();
  ?> <!--Début de la vue -->


 <div class="contain">
   <div class="secQuart">
     <?php
      foreach ($requete->fetchAll() as $film) { ?>
       <div class="groupInfo">
         <p><a href="index.php?action=detFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></p>
         <p><img class="img_aff" src="<?= $film["affiche"] ?>" alt="Affiche du film . $film['titre']" /></p>
       </div>
     <?php } ?>
   </div>
 </div>


 <?php

  $titre = "<h1 class='titreH1'>Genre : " . $genre['libelle_genre'] . "</h1>";
  $contenu = ob_get_clean(); //Fin de la vue 
  require "view/template.php";

  ?>

 <!--Entre les 2 ob sera contenu dans $contenu -->
 <!-- tjs donner valeur a $titre -> <title>$titre</title> -->
 <!-- tjs donner valeur a $titre_sec -> <h2>$titre_sec</h2> -->
 <!-- tjs donner valeur a $contenu ->  $contenu  -->