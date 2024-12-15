<?php

namespace Controller; // connexion

use Model\Connect;

class RealController

{
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
        ORDER BY personne.nom ASC
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


    public function addReal()
    {
        $pdo = Connect::seConnecter();

        if (isset($_POST['submit'])) {
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

                $requete->execute([
                    "name_real" => $name_real,
                    "firstname_real" => $firstname_real,
                    "sexe" => $sexe,
                    "ddn_real" => $ddn_real,
                    "url_real" => $url_real
                ]);

                $idPersonne = $pdo->lastInsertId();

                $requete1 = $pdo->prepare("
                INSERT INTO realisateur (id_personne)
                VALUES (:idPersonne)
                ");

                $requete1->execute(["idPersonne" => $idPersonne]);



                header("Location: index.php?action=listReals");
                exit();
            }
        }

        require "view/addReal.php";
    }
}

// ensemble des requêtes 
