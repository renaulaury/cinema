<?php ob_start() ?> <!--Début de la vue -->


        <form action="index.php?action=addGenre" method="post">
                <label for="genre">Genre :</label>
                <input type="text" id="genre" name="genre"></input>
                <input type="submit" name="submit" value="Valider">
        </form>

<?php


$titre = "Ajout d'un genre";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>