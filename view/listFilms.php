 <?php
   ob_start();
   $film = $requete->fetch();
   ?>

<div class="intro">
    <p>Il y a <?= $requete->rowCount() ?> films.</p>
    <div class="group_btn">
      <button onclick="window.location.href='index.php?action=addFilm';">Ajouter un film</button>
      <button onclick="window.location.href='index.php?action=addCasting';">Ajouter un casting</button>
  </div>
 </div>

<section class="princ">
  <?php
    foreach ($requete->fetchAll() as $film) { ?>
      <div class="film_group">
        <div class="film_text">
          <p><a href="index.php?action=detFilm&id=<?= $film['id_film'] ?>"><?= $film["titre"] ?></a></p>
          <p>Sorti le : <?= $film["release_date"] ?></p>
        </div>
        <p><img class="img_aff" src="<?= $film["affiche"] ?>" alt="Affiche du film . $film['titre']" /></p>
      </div>

  <?php } ?>
 </section>

 <?php

   $titre = "Liste des films";
   $contenu = ob_get_clean(); //Fin de la vue 
   require "view/template.php";

   ?>

 <!--Entre les 2 ob sera contenu dans $contenu -->
 <!-- tjs donner valeur a $titre -> <title>$titre</title> -->
 <!-- tjs donner valeur a $titre_sec -> <h2>$titre_sec</h2> -->
 <!-- tjs donner valeur a $contenu ->  $contenu  -->