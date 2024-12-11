 <?php ob_start() ?> <!--Début de la vue -->

 <table>
     <thead>
         <tr>
             <th>TITRE</th>
             <th>ANNEE SORTIE</th>
             <th>GENRE</th>
             <th>DUREE</th>
             <th>REAL</th>
             <th>ACTEURS</th>
         </tr>
     </thead>

     <tbody>
         <?php
            foreach ($requete->fetchAll() as $film) { ?>
             <tr>
                 <td><?= $film["titre"] ?></td>
                 <td><?= $film["release_date"] ?></td>
                 <td><?= $film["libelle_genre"] ?></td>
                 <td><?= $film["duree_film"] ?></td>
                 <td><?= $film["person_Real"] ?></td>
                 <td><?= $film["person_Acteur"] ?></td>
             </tr>
         <?php } ?>
     </tbody>
 </table>

 <?php

    $titre = "Détail d'un film";
    $contenu = ob_get_clean(); //Fin de la vue 
    require "view/template.php";

    ?>

 <!--Entre les 2 ob sera contenu dans $contenu -->
 <!-- tjs donner valeur a $titre -> <title>$titre</title> -->
 <!-- tjs donner valeur a $titre_sec -> <h2>$titre_sec</h2> -->
 <!-- tjs donner valeur a $contenu ->  $contenu  -->