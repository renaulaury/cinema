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

    public function detFilm()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
         SELECT titre, 
                YEAR(date_sortie_fr) AS annee_sortie, 
                TIME_FORMAT(SEC_TO_TIME(duree * 60), '%H:%i') AS duree_film, 
                libelle_genre, 
                CONCAT(realisateur_prenom.prenom, ' ', realisateur_prenom.nom) AS person_Real,
                GROUP_CONCAT(CONCAT(acteur_prenom.prenom, ' ', acteur_prenom.nom) SEPARATOR ', ') AS person_Acteur
            FROM film
            INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
            INNER JOIN personne AS realisateur_prenom ON realisateur.id_personne = realisateur_prenom.id_personne
            INNER JOIN genre_film ON film.id_film = genre_film.id_film
            INNER JOIN genre ON genre_film.id_genre = genre.id_genre
            INNER JOIN casting ON film.id_film = casting.id_film     
            INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur   
            INNER JOIN personne AS acteur_prenom ON acteur.id_personne = acteur_prenom.id_personne
            GROUP BY film.id_film, libelle_genre;
    ");

        require "view/detFilm.php"; //necessaire pour récuperer la vue qui nous intérésse
    }

    public function listActeurs()
    {
        $pdo = Connect::seConnecter();
        // $requete = $pdo->prepare("SELECT * FROM acteur WHERE id_acteur = :id"); //prepare car on dde l'id $id
        // $requete->execute(["id" => $id]);
        $requete = $pdo->query("
        SELECT nom, prenom, date_naissance 
        FROM personne
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne;
        ");

        require "view/listActeurs.php";
    }

    public function listReals()
    {
        $pdo = Connect::seConnecter();
        // $requete = $pdo->prepare("SELECT * FROM acteur WHERE id_acteur = :id"); //prepare car on dde l'id $id
        // $requete->execute(["id" => $id]);
        $requete = $pdo->query("
        SELECT nom, prenom, date_naissance 
        FROM personne
        INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne;
        ");

        require "view/listReals.php";
    }
}

// ensemble des requêtes 
