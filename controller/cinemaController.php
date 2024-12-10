<?php

namespace Controller; // connexion

use Model\Connect;

class cinemaController

{
    public function listFilms()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT film.titre, film.date_sortie_fr, libelle_genre
        FROM genre
        INNER JOIN genre_film ON genre_film.id_genre = genre.id_genre
        INNER JOIN film ON genre_film.id_film = film.id_film
        ORDER BY genre.libelle_genre, film.titre;
        ");

        require "view/listFilms.php"; //necessaire pour récuperer la vue qui nous intérésse
    }

    public function detActeur($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("SELECT * FROM acteur WHERE id_acteur = :id"); //prepare car on dde l'id $id
        $requete->execute(["id" => $id]);

        require "view/acteur/detailActeur.php";
    }
}

// ensemble des requêtes 
