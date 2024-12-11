<?php

namespace Controller; // connexion

use Model\Connect;

class CinemaController

{
    public function accueil()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT  		
            film.id_film, 
            film.titre, 
            synopsis,
            affiche,
            CONCAT(DAY(film.date_sortie_fr), '-', MONTH(film.date_sortie_fr), '-', YEAR(film.date_sortie_fr)) AS release_date
        FROM film        
        GROUP BY film.id_film, film.titre
        ");

        $requete2 = $pdo->query("
        SELECT CONCAT(personne.prenom, ' ',personne.nom) AS name_real,	
                photo
        FROM personne
        INNER JOIN realisateur ON personne.id_realisateur = personne.id_realisateur
        INNER JOIN acteur ON personne.id_acteur = acteur.id_personne
        ");

        require "view/accueil.php"; //necessaire pour récuperer la vue qui nous intérésse
    }

    public function listFilms()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT  		
            film.id_film, 
            film.titre, 
            CONCAT(DAY(film.date_sortie_fr), '-', MONTH(film.date_sortie_fr), '-', YEAR(film.date_sortie_fr)) AS release_date
        FROM film        
        GROUP BY film.id_film, film.titre
        ");

        $requete2 = $pdo->prepare("
        SELECT genre.id_genre, genre.libelle_genre
        FROM genre
        INNER JOIN genre_film ON genre.id_genre = genre_film.id_genre
        ");
        $requete2->execute();

        require "view/listFilms.php"; //necessaire pour récuperer la vue qui nous intérésse
    }

    public function detFilm($id)
    {
        $pdo = Connect::seConnecter();
        $requete1 = $pdo->prepare("
        SELECT film.id_film, 
                film.titre,
                CONCAT(DAY(film.date_sortie_fr), '-', MONTH(film.date_sortie_fr), '-', YEAR(film.date_sortie_fr)) AS release_date,
                TIME_FORMAT(SEC_TO_TIME(duree * 60), '%H:%i') AS timing,
                film.synopsis,
                affiche, 
                realisateur.id_realisateur,
                    CONCAT(personne.prenom, ' ',personne.nom) AS name_real,	
                    CONCAT(DAY(personne.date_naissance), '-', MONTH(personne.date_naissance), '-', YEAR(personne.date_naissance)) AS birth_date
        FROM film
        INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
        INNER JOIN personne ON realisateur.id_personne = personne.id_personne
        WHERE film.id_film = :id
        ");
        $requete1->execute(["id" => $id]);

        $requete2 = $pdo->prepare("
        SELECT genre.id_genre, genre.libelle_genre
        FROM genre
        INNER JOIN genre_film ON genre.id_genre = genre_film.id_genre
        WHERE genre_film.id_film = :id
        ");
        $requete2->execute(["id" => $id]);

        $requete3 = $pdo->prepare("
        SELECT acteur.id_acteur, role.id_role,
                film.id_film, 
                CONCAT(personne.prenom, ' ',personne.nom) AS name_actor, 
                personnage
        FROM film
        INNER JOIN casting ON film.id_film = casting.id_film
        INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
        INNER JOIN personne ON acteur.id_personne = personne.id_personne
        INNER JOIN role ON casting.id_role = role.id_role
        WHERE film.id_film = :id
        ");
        $requete3->execute(["id" => $id]);

        require "view/detFilm.php"; //necessaire pour récuperer la vue qui nous intérésse
    }

    public function listActeurs()
    {
        $pdo = Connect::seConnecter();
        // $requete = $pdo->prepare("SELECT * FROM acteur WHERE id_acteur = :id"); //prepare car on dde l'id $id
        // $requete->execute(["id" => $id]);
        $requete = $pdo->query("
        SELECT acteur.id_acteur,
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
        SELECT CONCAT(personne.prenom, ' ', personne.nom) AS name_acteur,
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

    public function listReals()
    {
        $pdo = Connect::seConnecter();
        // $requete = $pdo->prepare("SELECT * FROM acteur WHERE id_acteur = :id"); //prepare car on dde l'id $id
        // $requete->execute(["id" => $id]);
        $requete = $pdo->query("
        SELECT  realisateur.id_realisateur,
                CONCAT(personne.prenom, ' ', personne.nom) AS name_real                
        FROM personne
        INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
        ");


        require "view/listReals.php";
    }

    public function detReal($id)
    {
        $pdo = Connect::seConnecter();
        $requete1 = $pdo->prepare("
        SELECT CONCAT(personne.prenom, ' ', personne.nom) AS name_real,
                CONCAT(DAY(date_naissance), '-', MONTH(date_naissance), '-', YEAR(date_naissance)) AS birth_date
        FROM personne
        INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
        WHERE realisateur.id_realisateur = :id
        ");

        $requete1->execute(["id" => $id]);

        $requete2 = $pdo->prepare("
         SELECT  film.id_film,
 			    film.titre, 
	            film.affiche, 
			    GROUP_CONCAT(genre.libelle_genre) AS tous_genre 	      
        FROM film
        INNER JOIN genre_film ON film.id_film = genre_film.id_film 
        INNER JOIN genre ON genre_film.id_genre = genre.id_genre   
		WHERE film.id_realisateur = :id     
	    GROUP BY film.id_film
        ");

        $requete2->execute(["id" => $id]);

        require "view/detReal.php";
    }

    public function listGenres()
    {
        $pdo = Connect::seConnecter();
        // $requete = $pdo->prepare("SELECT * FROM acteur WHERE id_acteur = :id"); //prepare car on dde l'id $id
        // $requete->execute(["id" => $id]);
        $requete = $pdo->query("
            SELECT  genre.id_genre, libelle_genre               
            FROM genre
        ");

        require "view/listGenres.php";
    }

    public function detGenre($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT  titre, affiche
            FROM film
            INNER JOIN genre_film ON film.id_film = genre_film.id_film
            INNER JOIN genre ON genre_film.id_genre = genre.id_genre
            WHERE genre.id_genre = :id
        ");
        $requete->execute(["id" => $id]);


        require "view/detGenre.php"; //necessaire pour récuperer la vue qui nous intérésse
    }

    public function listRoles()
    {
        $pdo = Connect::seConnecter();
        // $requete = $pdo->prepare("SELECT * FROM acteur WHERE id_acteur = :id"); //prepare car on dde l'id $id
        // $requete->execute(["id" => $id]);
        $requete = $pdo->query("
            SELECT  role.id_role, personnage              
            FROM role
        ");

        require "view/listRoles.php";
    }

    public function detRole($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT  titre, affiche, GROUP_CONCAT(libelle_genre) AS tous_genre
            FROM film
            INNER JOIN genre_film ON film.id_film = genre_film.id_film
            INNER JOIN genre ON genre_film.id_genre = genre.id_genre
            INNER JOIN casting ON film.id_film = casting.id_film
            INNER JOIN role ON casting.id_role = role.id_role
            WHERE role.id_role = :id
            GROUP BY film.titre, film.id_film
        ");
        $requete->execute(["id" => $id]);


        require "view/detRole.php"; //necessaire pour récuperer la vue qui nous intérésse
    }
}

// ensemble des requêtes 
