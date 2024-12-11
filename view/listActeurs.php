<?php ob_start() ?> <!--Début de la vue -->

<p>Il y a <?= $requete->rowCount() ?> acteurs.</p>

<table>
    <thead>
        <tr>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>DATE DE NAISSANCE</th>

        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($requete->fetchAll() as $acteur) { ?>
            <tr>
                <td><?= $acteur["nom"] ?></td>
                <td><?= $acteur["prenom"] ?></td>
                <td><?= $acteur["birth_date"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des acteurs";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>