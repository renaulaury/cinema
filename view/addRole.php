<?php ob_start() ?> <!--Début de la vue -->


<form action="index.php?action=addRole" method="post">
        <section class="formSec">
                <div class="formSolo">
                        <p>Rôle :</p>
                        <p class="inputSolo"><input type="text" id="role" name="role"></input></p>
                </div>
        </section>

        <div class="validation">
                <input class="validInput" type="submit" name="submit" value="Valider">
        </div>
</form>

<?php


$titre = "<h1 class='titreH1'>Ajout d'un rôle</h1>";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>