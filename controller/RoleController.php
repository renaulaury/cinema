<?php

namespace Controller; // connexion

use Model\Connect;

class RoleController

{
    public function listRoles()
    {
        $pdo = Connect::seConnecter();
        // $requete = $pdo->prepare("SELECT * FROM acteur WHERE id_acteur = :id"); //prepare car on dde l'id $id
        // $requete->execute(["id" => $id]);
        $requete = $pdo->query("
            SELECT  role.id_role, personnage, role.photo              
            FROM role
            ORDER BY personnage ASC
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

    public function addRole()
    {
        $pdo = Connect::seConnecter();

        if (isset($_POST['submit'])) {
            $name = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($name) {
                $requete = $pdo->prepare("
            INSERT INTO role (personnage)
            VALUES (:name)
            ");

                $requete->execute(["name" => $name]);

                header("Location: index.php?action=listRole");
                exit();
            }
        }

        require "view/addRole.php";
    }
}

// ensemble des requêtes 
