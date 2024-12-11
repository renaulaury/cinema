 <?php
    ob_start();
    $film = $requete->fetch();
    ?> <!--Début de la vue -->

 <p class="nb">Il y a <?= $requete->rowCount() ?> films.</p>

 <table>
     <thead>
         <tr>
             <th>TITRE</th>
             <th>ANNEE SORTIE</th>
             <th>GENRE</th>
         </tr>
     </thead>

     <tbody>
         <?php
            foreach ($requete->fetchAll() as $film) { ?>
             <tr>
                 <td><a href="index.php?action=detFilm&id=<?= $film['id_film'] ?>"><?= $film["titre"] ?></a></td>
                 <td><?= $film["release_date"] ?></td>
                 <?php
                    foreach ($requete2->fetchAll() as $genre) { ?>
                     <td><a href="index.php?action=detGenre&id=<?= $genre["id_genre"] ?>"><?= $genre["libelle_genre"] ?></a> </td>
                 <?php } ?>

             </tr>
         <?php } ?>
     </tbody>
 </table>

 <?php

    $titre = "Liste des films";
    $contenu = ob_get_clean(); //Fin de la vue 
    require "view/template.php";

    ?>

 <!--Entre les 2 ob sera contenu dans $contenu -->
 <!-- tjs donner valeur a $titre -> <title>$titre</title> -->
 <!-- tjs donner valeur a $titre_sec -> <h2>$titre_sec</h2> -->
 <!-- tjs donner valeur a $contenu ->  $contenu  -->