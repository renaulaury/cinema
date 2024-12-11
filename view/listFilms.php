 <?php
    ob_start();
    $film = $requete->fetch();
    ?> <!--Début de la vue -->

 <p class="nb">Il y a <?= $requete->rowCount() ?> films.</p>

 <!-- Ici mon pb est que ma 2e boucle, boucle sur tous les genres et non
  sur les genres du film en cours -->
 <?php
    foreach ($requete->fetchAll() as $film) { ?>
     <div>
         <p><a href="index.php?action=detFilm&id=<?= $film['id_film'] ?>"><?= $film["titre"] ?></a></p>
         <p><?= $film["release_date"] ?></p>
         <p><img src="<?= $film["affiche"] ?>" alt="Affiche du film . $film['titre']" /></p>

         <?php
            foreach ($requete2->fetchAll() as $genre) { ?>
             <p><a href="index.php?action=detGenre&id=<?= $genre["id_genre"] ?>"><?= $genre["libelle_genre"] ?></a> </p>

         <?php } ?>
     </div>
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