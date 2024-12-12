<?php ob_start() ?> <!--Début de la vue -->


        <form action="index.php?action=addFilm" method="post">
                <p>Informations concernant le film</p>
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
                        <input type="number" id="duree" name="duree" placeholder="En minutes"></input>
                </p>
                <p>
                        <label for="textarea">Synopsis :</label>
                        <textarea id="textarea" name="textarea" rows="4" cols="50"></textarea>
                </p>
                <p>
                        <label for="note">Note :</label>

                        <label for="note">1</label>
                        <input type="radio" id="note1" name="note" value="1"  />

                        <label for="note">2</label>               
                        <input type="radio" id="note2" name="note" value="2" /> 

                        <label for="note">3</label>  
                        <input type="radio" id="note3" name="note" value="33"  />
                                     
                        <label for="note">4</label> 
                        <input type="radio" id="note4" name="note" value="3" /> 
                                     
                        <label for="note">5</label>               
                        <input type="radio" id="note5" name="note" value="5" /> 
                </p>
                <p>
                        <label for="url_affiche">Url de l'affiche :</label>
                        <input type="text" id="url_affiche" name="url_affiche"></input>
                </p>

                <p>Informations concernant le réalisateur</p>

                <select name="liste_real">
                        <?php foreach ($requete->fetchAll() as $real) { ?>
                        <option value="<?= $real["id_realisateur"] ?>"><?= $real["name_real"] ?></option>
                <?php } ?>
                </select>

                <p>Informations concernant le genre</p>
                 
                        <?php foreach ($requete1->fetchAll() as $genre) { ?>
                                <input type="checkbox" id="<?= $genre["id_genre"] ?>" name="genre"/>
                                <label for="genre"><?= $genre["libelle_genre"] ?></label>
                                
                <?php } ?>
               

                <input type="submit" name="submit" value="Valider">
        </form>

<?php


$titre = "Ajout d'un film";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>