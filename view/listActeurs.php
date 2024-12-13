<?php ob_start() ?> <!--Début de la vue -->

<p>Il y a <?= $requete->rowCount() ?> acteurs.</p>



<?php
foreach ($requete->fetchAll() as $actor) { ?>

        <p><a href="index.php?action=detActeur&id=<?= $actor["id_acteur"] ?>"><?= $actor["name_actor"] ?></a></p>
        <img class="img_pers" src="<?= $actor["photo"] ?>" alt="Photo de  . $actor['photo']" />

<?php } ?>


<?php

$titre = "Liste des acteurs";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>