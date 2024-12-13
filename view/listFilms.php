 <?php
   ob_start();
   $film = $requete->fetch();
   ?>


 <p>Il y a <?= $requete->rowCount() ?> films.</p>
 <button onclick="window.location.href='index.php?action=addFilm';">Ajouter un film</button>
 <button onclick="window.location.href='index.php?action=addCasting';">Ajouter un casting</button>



 <?php
   foreach ($requete->fetchAll() as $film) { ?>

    <p><a href="index.php?action=detFilm&id=<?= $film['id_film'] ?>"><?= $film["titre"] ?></a></p>
    <?php
      /*
            <p><?= $film["tous_genre"] ?> </p>
            */
      ?>
    <p><?= $film["release_date"] ?></p>
    <p><img src="<?= $film["affiche"] ?>" alt="Affiche du film . $film['titre']" /></p>


 <?php } ?>


 <?php

   $titre = "Liste des films";
   $contenu = ob_get_clean(); //Fin de la vue 
   require "view/template.php";

   ?>

 <!--Entre les 2 ob sera contenu dans $contenu -->
 <!-- tjs donner valeur a $titre -> <title>$titre</title> -->
 <!-- tjs donner valeur a $titre_sec -> <h2>$titre_sec</h2> -->
 <!-- tjs donner valeur a $contenu ->  $contenu  -->