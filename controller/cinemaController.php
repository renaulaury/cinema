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
        LIMIT 4
        ");

        $requete2 = $pdo->query("
        SELECT realisateur.id_realisateur,
                CONCAT(personne.prenom, ' ',personne.nom) AS name_real,	
                photo
        FROM personne
        INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
        LIMIT 4
        ");

        $requete3 = $pdo->query("
        SELECT acteur.id_acteur,
                CONCAT(personne.prenom, ' ',personne.nom) AS name_acteur,	
                photo
        FROM personne
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        LIMIT 4
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
            GROUP_CONCAT(genre.libelle_genre) AS tous_genre,
            affiche,
            CONCAT(DAY(film.date_sortie_fr), '-', MONTH(film.date_sortie_fr), '-', YEAR(film.date_sortie_fr)) AS release_date
        FROM film        
        INNER JOIN genre_film ON film.id_film = genre_film.id_film
        INNER JOIN genre ON genre_film.id_genre = genre.id_genre
        GROUP BY film.id_film, film.titre
        ");

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
                photo,
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
                photo,
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

    public function listReals()
    {
        $pdo = Connect::seConnecter();
        // $requete = $pdo->prepare("SELECT * FROM acteur WHERE id_acteur = :id"); //prepare car on dde l'id $id
        // $requete->execute(["id" => $id]);
        $requete = $pdo->query("
        SELECT  realisateur.id_realisateur,
                photo,
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
               CONCAT(DAY(date_naissance), '-', MONTH(date_naissance), '-', YEAR(date_naissance)) AS birth_date,
               photo               
        FROM personne
        INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
        WHERE realisateur.id_realisateur = :id
        ");

        $requete1->execute(["id" => $id]);

        $requete2 = $pdo->prepare("
         SELECT  film.id_film,
 			    film.titre, 
	            film.affiche, 
                genre.id_genre,
			    GROUP_CONCAT(genre.libelle_genre) AS tous_genre 	      
        FROM film
        INNER JOIN genre_film ON film.id_film = genre_film.id_film 
        INNER JOIN genre ON genre_film.id_genre = genre.id_genre   
		WHERE film.id_realisateur = :id     
	    GROUP BY film.id_film, genre.id_genre
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
            SELECT  film.id_film, titre, affiche
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
             SELECT  role.id_role, film.id_film, acteur.id_acteur,
                    personnage,
                    titre, 
                    affiche, 
                    CONCAT(personne.prenom, ' ', personne.nom) AS name_actor,
                    GROUP_CONCAT(libelle_genre) AS tous_genre
            FROM film
            INNER JOIN genre_film ON film.id_film = genre_film.id_film
            INNER JOIN genre ON genre_film.id_genre = genre.id_genre
            INNER JOIN casting ON film.id_film = casting.id_film
            INNER JOIN role ON casting.id_role = role.id_role
            INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
            INNER JOIN personne ON acteur.id_personne = personne.id_personne
            WHERE role.id_role = :id           
            GROUP BY film.titre, 
                    film.id_film, 
                    role.id_role,
                    personnage,
                    titre, name_actor,
                    affiche, film.id_film, acteur.id_acteur
        ");
        $requete->execute(["id" => $id]);


        require "view/detRole.php"; //necessaire pour récuperer la vue qui nous intérésse
    }

    // Gestion du formulaire
    public function addGenre()
    {
        $pdo = Connect::seConnecter();

       if (isset($_POST['submit']))  {
        $name = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($name) {
            $requete = $pdo->prepare("
            INSERT INTO genre (libelle_genre)
            VALUES (:name)
            ");

        $requete->execute(["name" => $name]);

        header("Location: index.php?action=listGenres");
        exit();
        }
       }

       require "view/addGenre.php";
    }

    public function addReal()
    {
        $pdo = Connect::seConnecter();

       if (isset($_POST['submit']))  {
            $name_real = filter_input(INPUT_POST, 'name_real', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $firstname_real = filter_input(INPUT_POST, 'firstname_real', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexe = filter_input(INPUT_POST, 'sexe', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $ddn_real = filter_input(INPUT_POST, 'ddn_real', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $url_real = filter_input(INPUT_POST, 'url_real', FILTER_VALIDATE_URL);


            if ($name_real && $firstname_real && $sexe && $ddn_real && $url_real) {
                $requete = $pdo->prepare("
                INSERT INTO personne (nom, prenom, sexe, date_naissance, photo)
                VALUES (:name_real, :firstname_real, :sexe, :ddn_real, :url_real)
                ");

                $requete->execute(["name_real" => $name_real,
                                "firstname_real" => $firstname_real, 
                                "sexe" => $sexe,
                                "ddn_real" => $ddn_real, 
                                "url_real" => $url_real]);

                $idPersonne = $pdo->lastInsertId();

                $requete1 = $pdo->prepare("
                INSERT INTO realisateur (id_personne)
                VALUES (:idPersonne)
                ");

                $requete1->execute(["idPersonne" => $idPersonne]);

                // requete insert ajouter le réalisateur

                header("Location: index.php?action=listReals");
                exit();
            }
       }

       require "view/addReal.php";
    }

    public function addFilm()
    {
        $pdo = Connect::seConnecter();

       if (isset($_POST['submit']))  {
        $name = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($name) {
            $requete = $pdo->prepare("
            INSERT INTO genre (libelle_genre)
            VALUES (:name)
            ");

        $requete->execute(["name" => $name]);

        header("Location: index.php?action=listFilms");
        exit();
        }
       }

       require "view/addFilm.php";
    }
}

// ensemble des requêtes 

