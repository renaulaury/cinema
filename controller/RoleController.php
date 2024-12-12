<?php

namespace Controller; // connexion

use Model\Connect;

class RoleController

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

    
}

// ensemble des requêtes 

