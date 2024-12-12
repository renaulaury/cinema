<?php

namespace Controller; // connexion

use Model\Connect;

class ActeurController

{

    public function listActeurs()
    {
        $pdo = Connect::seConnecter();
        // $requete = $pdo->prepare("SELECT * FROM acteur WHERE id_acteur = :id"); //prepare car on dde l'id $id
        // $requete->execute(["id" => $id]);
        $requete = $pdo->query("
        SELECT acteur.id_acteur,
                photo,
                CONCAT(personne.prenom, ' ', personne.nom) AS name_actor
        FROM personne
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        ");

        require "view/listActeurs.php";
    }

    public function detActeur($id)
    {
        $pdo = Connect::seConnecter();
        $requete1 = $pdo->prepare("
        SELECT photo, 
                CONCAT(personne.prenom, ' ', personne.nom) AS name_acteur,
                CONCAT(DAY(date_naissance), '-', MONTH(date_naissance), '-', YEAR(date_naissance)) AS birth_date
        FROM personne
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        WHERE acteur.id_acteur = :id
        ");

        $requete1->execute(["id" => $id]);

        $requete2 = $pdo->prepare("
          SELECT  genre.id_genre, film.id_film,
 			    film.titre, 
	            film.affiche, 
	            role.personnage,
			    GROUP_CONCAT(genre.libelle_genre) AS tous_genre 	      
            FROM film
            INNER JOIN casting ON film.id_film = casting.id_film
            INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
            INNER JOIN role ON casting.id_role = role.id_role
            INNER JOIN genre_film ON film.id_film = genre_film.id_film 
            INNER JOIN genre ON genre_film.id_genre = genre.id_genre   
            WHERE casting.id_acteur = :id   
            GROUP BY film.id_film, film.titre, film.affiche, role.personnage, genre.id_genre
        ");

        $requete2->execute(["id" => $id]);

        require "view/detActeur.php";
    }

    
    
}

// ensemble des requêtes 

