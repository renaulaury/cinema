<?php ob_start() ?> <!--Début de la vue -->


<form action="index.php?action=addFilm" method="post">
        <section>
                <h2>Informations concernant le film</h2>
                <div>
                        <p><label for="titre">Titre :</label></p>
                        <p><input type="text" id="titre" name="titre"></input></p>
                </div>
                <div>
                        <p><label for="dds_fr">Date de sortie en France :</label></p>
                        <p><input type="date" id="dds_fr" name="dds_fr" placeholder="AAAAMMJJ"></input></p>
                </div>
                <div>
                        <p><label for="duree">Durée :</label></p>
                        <p> <input type="number" id="duree" name="duree" placeholder="En minutes"></input></p>
                </div>
                <div>
                        <p><label for="textarea">Synopsis :</label></p>
                        <p><textarea id="textarea" name="textarea" rows="4" cols="50"></textarea></p>
                </div>
                <div>
                        <p>
                                <label for="note">Note :</label>
                        </p>
                        <p class="blockNote">
                        <p>
                                <label for="note">1</label>
                                <input type="radio" id="note1" name="note" value="1" />
                        </p>

                        <p>
                                <label for="note">2</label>
                                <input type="radio" id="note2" name="note" value="2" />
                        </p>

                        <p>
                                <label for="note">3</label>
                                <input type="radio" id="note3" name="note" value="33" />
                        </p>

                        <p>
                                <label for="note">4</label>
                                <input type="radio" id="note4" name="note" value="3" />
                        </p>

                        <p>
                                <label for="note">5</label>
                                <input type="radio" id="note5" name="note" value="5" />
                        </p>
                        </p>
                </div>
                <div>
                        <p><label for="url_affiche">Url de l'affiche :</label></p>
                        <p><input type="text" id="url_affiche" name="url_affiche"></input></p>
                </div>
        </section>

        <section>

                <h2>Informations concernant le réalisateur</h2>

                <select name="liste_real">
                        <?php foreach ($req_real->fetchAll() as $real) { ?>
                                <option value="<?= $real["id_realisateur"] ?>"><?= $real["name_real"] ?></option>
                        <?php } ?>
                </select>
        </section>

        <section>
                <h2>Informations concernant le genre</h2>

                <?php foreach ($req_genre->fetchAll() as $genre) { ?>
                        <input type="checkbox" id="<?= $genre["id_genre"] ?>" value="<?= $genre["id_genre"] ?>" name="genre[]" />
                        <label for="genre"><?= $genre["libelle_genre"] ?></label>
                <?php } ?>

        </section>


        <div class="validation">
                <input type="submit" name="submit" value="Valider">
        </div>
</form>

<?php


$titre = "<h1 class='titreH1'>Ajout d'un film</h1>";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>