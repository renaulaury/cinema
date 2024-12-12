<?php ob_start() ?> <!--Début de la vue -->

<p>Il y a <?= $requete->rowCount() ?> réalisateurs.</p>

<button onclick="window.location.href='index.php?action=addReal';">Ajouter un réalisateur</button>

<?php
foreach ($requete->fetchAll() as $real) { ?>
        <a href="index.php?action=detReal&id=<?= $real["id_realisateur"] ?>"><?= $real["name_real"] ?></a></p>
        <img src="<?= $real["photo"] ?>" alt="Photo de  . $real['photo']" />
<?php } ?>



<?php

$titre = "Liste des réalisateurs";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>