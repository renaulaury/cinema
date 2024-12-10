<?php

namespace Controller; // connexion

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

    // public function detActeur($id)
    // {
    //     $pdo = Connect::seConnecter();
    //     $requete = $pdo->prepare("SELECT * FROM acteur WHERE id_acteur = :id"); //prepare car on dde l'id $id
    //     $requete->execute(["id" => $id]);

    //     require "view/acteur/detailActeur.php";
    // }
}

// ensemble des requêtes 
