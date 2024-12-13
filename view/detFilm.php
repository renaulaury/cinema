 <?php
  ob_start();
  $film = $requete1->fetch();


  ?>
 <p><?= $film["titre"] ?> </p>

 <?php
  foreach ($requete2->fetchAll() as $genre) { ?>
   <p><a href="index.php?action=detGenre&id=<?= $genre["id_genre"] ?>"><?= $genre["libelle_genre"] ?></a> </p>
 <?php } ?>

 <p><?= $film["release_date"] ?> </p>
 <p><?= $film["timing"] ?> </p>
 <p><img class='img_aff" src="<?= $film["affiche"] ?>" alt="Affiche du film . $film['titre']" /></p>

 <p><?= $film["synopsis"] ?> </p>

 <div>infos real</div>
 <p><a href="index.php?action=detReal&id=<?= $film["id_realisateur"] ?>"><?= $film["name_real"] ?></a></p>
 <p><?= $film["birth_date"] ?> </p>
 <img class='img_pers" src="<?= $film["photo"] ?>" alt="Photo de  . $film['photo']" />

 <div>infos acteurs</div>
 <?php
  foreach ($requete3->fetchAll() as $actor) { ?>
   <p><a href="index.php?action=detActeur&id=<?= $actor["id_acteur"] ?>"><?= $actor["name_actor"] ?></a> </p>
   <p><a href="index.php?action=detRole&id=<?= $actor["id_role"] ?>"><?= $actor["personnage"] ?></a> </p>
   <img class='img_pers" src="<?= $actor["photo"] ?>" alt="Photo de  . $actor['photo']" />
 <?php } ?>

 <?php

  $titre = "Détail du film " . $film["titre"];
  $contenu = ob_get_clean(); //Fin de la vue 
  require "view/template.php";

  ?>

 <!--Entre les 2 ob sera contenu dans $contenu -->
 <!-- tjs donner valeur a $titre -> <title>$titre</title> -->
 <!-- tjs donner valeur a $titre_sec -> <h2>$titre_sec</h2> -->
 <!-- tjs donner valeur a $contenu ->  $contenu  -->