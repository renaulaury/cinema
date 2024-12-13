<?php

namespace Controller; // connexion

use Model\Connect;

class GenreController

{
    public function listGenres()
    {
        $pdo = Connect::seConnecter();
        // $requete = $pdo->prepare("SELECT * FROM acteur WHERE id_acteur = :id"); //prepare car on dde l'id $id
        // $requete->execute(["id" => $id]);
        $requete = $pdo->query("
            SELECT  genre.id_genre, libelle_genre               
            FROM genre
            ORDER BY libelle_genre ASC
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

