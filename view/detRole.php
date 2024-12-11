 <?php
   ob_start();
   ?> <!--Début de la vue -->


 <div>Info du film</div>
 <?php
   foreach ($requete->fetchAll() as $role) { ?>
    <p><?= $role["titre"] ?></p>
    <p><?= $role["tous_genre"] ?></p>
    <p><img src="<?= $role["affiche"] ?>" alt="Affiche du film . $role['titre']" /></p>

 <?php } ?>
 <?php

   $titre = "Role : ";
   $contenu = ob_get_clean(); //Fin de la vue 
   require "view/template.php";

   ?>

 <!--Entre les 2 ob sera contenu dans $contenu -->
 <!-- tjs donner valeur a $titre -> <title>$titre</title> -->
 <!-- tjs donner valeur a $titre_sec -> <h2>$titre_sec</h2> -->
 <!-- tjs donner valeur a $contenu ->  $contenu  -->