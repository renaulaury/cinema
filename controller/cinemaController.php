<!-- ensemble des requêtes -->

<?php
// connexion
namespace Controller;

use Model\Connect;

class cinemaController
{
    public function listFilms()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT titre, date_sortie_fr
        FROM film
        ");

        require "view/listFilms.php"; //necessaire pour récuperer la vue qui nous intérésse
    }
}
