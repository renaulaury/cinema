<?php ob_start() ?> <!--Début de la vue -->

<p>Il y a <?= $requete->rowCount() ?> genres.</p>


        <?php
        foreach ($requete->fetchAll() as $genre) { ?>
                <a href="index.php?action=detGenre&id=<?= $genre["id_genre"] ?>"><?= $genre["libelle_genre"] ?></a></p>
                     
        <?php } ?>

        <form action="CinemaController.php" method="post">
                <label for="genre">Genre :</label>
                <input type="text" id="genre" name="genre"></input>
                <input type="submit" value="Valider">
        </form>

<?php


$titre = "Liste des genres";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>