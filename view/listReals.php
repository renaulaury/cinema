<?php ob_start() ?> <!--Début de la vue -->

<p>Il y a <?= $requete->rowCount() ?> réalisateurs.</p>

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
        foreach ($requete->fetchAll() as $real) { ?>
            <tr>
                <td><?= $real["nom"] ?></td>
                <td><?= $real["prenom"] ?></td>
                <td><?= $real["birth_date"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des réalisateurs";
$contenu = ob_get_clean(); //Fin de la vue 
require "view/template.php";

?>