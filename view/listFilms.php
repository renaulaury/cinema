 <?php ob_start() ?> <!--Début de la vue -->

 <p>Il y a <?= $requete->rowCount() ?> films</p>

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
                 <td><a href="index.php?action=detFilm?$id"><?=$film["titre"] ?></a></td>
                 <td><?= $film["release_date"] ?></td>
                 <td><?= $film["libelle_genre"] ?></td>
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