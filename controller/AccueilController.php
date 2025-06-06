<?php

namespace Controller; // connexion

use Model\Connect;

class AccueilController

{
    public function accueil()
    {
        $pdo = Connect::seConnecter();

        $carrousel = $pdo->query("
        SELECT  		
            film.id_film, 
            film.titre, 
            synopsis,
            affiche,
            CONCAT(DAY(film.date_sortie_fr), '-', MONTH(film.date_sortie_fr), '-', YEAR(film.date_sortie_fr)) AS release_date
        FROM film    
        ORDER BY film.id_film DESC 
        LIMIT 3
        ");

        $requete = $pdo->query("
        SELECT  		
            film.id_film, 
            film.titre, 
            synopsis,
            affiche,
            CONCAT(DAY(film.date_sortie_fr), '-', MONTH(film.date_sortie_fr), '-', YEAR(film.date_sortie_fr)) AS release_date
        FROM film    
        ORDER BY film.id_film ASC
        LIMIT 5
        ");

        $requete2 = $pdo->query("
        SELECT realisateur.id_realisateur,
                CONCAT(personne.prenom, ' ',personne.nom) AS name_real,	
                photo
        FROM personne
        INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
        ORDER BY realisateur.id_realisateur DESC 
        LIMIT 5
        ");

        $requete3 = $pdo->query("
        SELECT acteur.id_acteur,
                CONCAT(personne.prenom, ' ',personne.nom) AS name_acteur,	
                photo
        FROM personne
        INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        ORDER BY acteur.id_acteur DESC 
        LIMIT 5
        ");

        require "view/accueil.php"; //necessaire pour récuperer la vue qui nous intérésse
    }
}

// ensemble des requêtes 
