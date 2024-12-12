<?php ob_start() ?> <!--Début de la vue -->


        <form action="index.php?action=addFilm" method="post">
                <p>
                        <label for="titre">Titre :</label>
                        <input type="text" id="titre" name="titre"></input>
                </p>
                <p>
                        <label for="dds_fr">Date de sortie en France :</label>
                        <input type="date" id="dds_fr" name="dds_fr" placeholder="AAAAMMJJ"></input>
                </p>
                <p>
                        <label for="duree">Durée :</label>
                        <input type="text" id="duree" name="duree" placeholder="En minutes"></input>
                </p>
                <p>
                        <label for="textarea">Synopsis :</label>
                        <textarea id="textarea" name="textarea" rows="4" cols="50"></textarea>
                </p>
                <p>
                        <label for="note">Note :</label>

                        <label for="note">1</label>
                        <input type="radio" id="note" name="note" value="1"  />

                        <label for="note">2</label>               
                        <input type="radio" id="note" name="note" value="2" /> 

                        <label for="note">3</label>  
                        <input type="radio" id="note" name="note" value="33"  />
                                     
                        <label for="note">4</label> 
                        <input type="radio" id="note" name="note" value="3" /> 
                                     
                        <label for="note">5</label>               
                        <input type="radio" id="note" name="note" value="5" /> 
                </p>
                <p>
                        <label for="url_affiche">Url de l'affiche :</label>
                        <input type="text" id="url_affiche" name="url_affiche"></input>
                </p>

                <input type="submit" name="submit" value="Valider">
        </form>

<?php


$titre = "Ajout d'un film";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>