<?php ob_start() ?> <!--Début de la vue -->


<form action="index.php?action=addActeur" method="post">
        <section class="formSec">
                <div class="blockNom">
                        <div class="formNom">
                                <p class="formLabel"><label for="name_acteur">Nom :</label></p>
                                <p><input type="text" id="name_acteur" name="name_acteur"></input></p>
                        </div>

                        <div class="formNom">
                                <p class="formLabel"><label for="firstname_acteur">Prénom :</label></p>
                                <p><input type="text" id="firstname_acteur" name="firstname_acteur"></input></p>
                        </div>
                </div>
        </section>

        <section class="formSec sexeDdn">
                <div class="formSexe">
                        <p class="titreSexe">Sexe :</p>

                        <div class="sexeFM">
                                <div class="radioSexe">
                                        <p><input type="radio" id="sexe_F" name="sexe" value="F" /></p>
                                        <p><label for="sexe_F">Femme</label></p>
                                </div>

                                <div class="radioSexe">
                                        <p><input type="radio" id="sexe_M" name="sexe" value="M" /></p>
                                        <p><label for="sexe_M">Homme</label></p>
                                </div>
                        </div>
                </div>

                <div class="formEncart formMini">
                        <p class="formLabel"><label for="ddn_acteur">Date de naissance :</label></p>
                        <p><input class="inputMini" type="date" id="ddn_acteur" name="ddn_acteur" placeholder="AAAAMMJJ"></input></p>
                </div>
        </section>

        <section class="formSec">
                <div class="formUrl">
                        <p class="formLabel"><label for="url_acteur">Url de l'acteur :</label></p>
                        <p><input type="text" id="url_acteur" name="url_acteur"></input></p>
                </div>
        </section>

        <div class="validation">
                <input class="validInput" type="submit" name="submit" value="Valider">
        </div>
</form>

<?php


$titre = "<h1 class='titreH1'>Ajout d'un acteur </h1>";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>