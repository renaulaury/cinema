<?php

namespace Controller; // connexion

use Model\Connect;

class FilmController

{
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

    public function addFilm()
    {
        $pdo = Connect::seConnecter();

        $req_real = $pdo->query("
             SELECT  realisateur.id_realisateur,
                CONCAT(personne.prenom, ' ', personne.nom) AS name_real                
            FROM personne
            INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
            ");

        $req_genre = $pdo->query("
            SELECT  genre.id_genre, libelle_genre               
            FROM genre
        ");
        
        if (isset($_POST['submit']))  {
            $titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $dds_fr = filter_input(INPUT_POST, 'dds_fr', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $duree = filter_input(INPUT_POST, 'duree', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $textarea = filter_input(INPUT_POST, 'textarea', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $url_affiche = filter_input(INPUT_POST, 'url_affiche', FILTER_VALIDATE_URL);
            $liste_real = filter_input(INPUT_POST, 'liste_real', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $genres = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                        
        if ($titre && $dds_fr && $duree && $textarea &&$note && $url_affiche && 
        $liste_real && $genres) {      
            $req_addFilmReal = $pdo->prepare("
            INSERT INTO film (titre, date_sortie_fr, duree, synopsis, note, affiche, id_realisateur)
            VALUES (:titre, :dds_fr, :duree, :textarea, :note, :affiche, :id_realisateur)
            ");        

            $req_addFilmReal->execute([
                "titre" => $titre,
                "dds_fr" => $dds_fr,
                "duree" => $duree,
                "textarea" => $textarea,
                "note" => $note,
                "affiche" => $url_affiche,
                "id_realisateur" => $liste_real
                ]);
               
            $idFilm = $pdo->lastInsertId();

            $req_addGenreFilm = $pdo->prepare("
                            INSERT INTO genre_film (id_film, id_genre)
                            VALUES (:idFilm, :idGenre)
            ");

            foreach ($genres as $genre) {
               $req_addGenreFilm->execute([
                "idFilm" => $idFilm, 
                "idGenre" => $genre
            ]);
            }


            header("Location: index.php?action=listFilms");
            exit();
            
            }
      }
      require "view/addFilm.php";       
    }

    public function addCasting()
    {
        $pdo = Connect::seConnecter();

        $req_film = $pdo->query("
            SELECT film.id_film, titre                           
            FROM film
        ");

        $req_acteur = $pdo->query("
            SELECT  acteur.id_acteur,
                CONCAT(personne.prenom, ' ', personne.nom) AS name_acteur                
            FROM personne
            INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        ");

        $req_role = $pdo->query("
            SELECT role.id_role, 
                    personnage
            FROM role
        ");
        
        if (isset($_POST['submit']))  {
            $titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $acteur = filter_input(INPUT_POST, 'name_acteur', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
            $role = filter_input(INPUT_POST, 'personnage', FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            
        if ($titre && $acteur && $role) {    
            $req_casting = $pdo->prepare("
                INSERT INTO casting (id_film, id_acteur, id_role)
                VALUES (:id_film, :id_acteur, :id_role)    
            ");

            $req_casting->execute([
                "id_film" => $titre,
                "id_acteur" => $acteur,
                "id_role" => $role
            ]);
            
            
            header("Location: index.php?action=addCasting");
            exit();
            
            }
      }
      require "view/addCasting.php";       
    }
}

// ensemble des requêtes 

