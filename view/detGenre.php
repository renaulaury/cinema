 <?php 
 ob_start();
 ?> <!--Début de la vue -->


    <div>Info filmographie</div>
<?php
foreach($requete->fetchAll() as $genre) { ?>
    <p><?= $genre["titre"] ?></p>
    <p><?= $genre["affiche"] ?></p>
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