<?php ob_start() ?> <!--Début de la vue -->


<form action="index.php?action=addReal" method="post">
        <section class="formSec">
                <div class="blockNom">
                        <div class="formNom">
                                <p class="formLabel"><label for="name_real">Nom :</label></p>
                                <p><input type="text" id="name_real" name="name_real"></input></p>
                        </div>

                        <div class="formNom">
                                <p class="formLabel"><label for="firstname_real">Prénom :</label></p>
                                <p><input type="text" id="firstname_real" name="firstname_real"></input></p>
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
                                        <p><label for="sece_M">Homme</label></p>
                                </div>
                        </div>
                </div>

                <div class="formEncart formMini ddnR">
                        <p class="formLabel"><label for="ddn_real">Date de naissance :</label></p>
                        <p><input class="inputMini" type="date" id="ddn_real" name="ddn_real" placeholder="AAAAMMJJ"></input></p>
                </div>
        </section>

        <section class="formSec">
                <div class="formUrl urlR">
                        <p class="formLabel "><label for="url_real">Url du réalisateur :</label></p>
                        <p><input type="text" id="url_real" name="url_real"></input></p>
                </div>
        </section>

        <div class="validation">
                <input class="validInput" type="submit" name="submit" value="Valider">
        </div>
</form>

<?php


$titre = "<h1 class='titreH1'>Ajout d'un réalisateur </h1>";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>