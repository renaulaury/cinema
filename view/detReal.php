 <?php 
 ob_start();
 $real = $requete1->fetch();
 ?> <!--Début de la vue -->

<div>Info real</div>

    <p><?= $real["name_real"] ?></p>
    <p><?= $real["birth_date"] ?></p>

    <div>Info filmographie</div>
<?php
foreach($requete2->fetchAll() as $info) { ?>
    <p><?= $info["titre"] ?></p>
    <p><?= $info["tous_genre"] ?></p>
    <p><?= $info["affiche"] ?></p>
 <?php } ?>
 <?php

    $titre = "Détail de la filmographie de";
    $contenu = ob_get_clean(); //Fin de la vue 
    require "view/template.php";

    ?>

 <!--Entre les 2 ob sera contenu dans $contenu -->
 <!-- tjs donner valeur a $titre -> <title>$titre</title> -->
 <!-- tjs donner valeur a $titre_sec -> <h2>$titre_sec</h2> -->
 <!-- tjs donner valeur a $contenu ->  $contenu  -->