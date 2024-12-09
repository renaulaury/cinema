/*Requête a*/
SELECT titre, YEAR(date_sortie_fr), round(duree / 60, 2), prenom, nom
FROM film
INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
INNER JOIN personne ON realisateur.id_personne = personne.id_personne

/*Requête b*/

/*Requête c*/
/*Requête d*/
/*Requête e*/
/*Requête f*/
/*Requête g*/
/*Requête h*/
/*Requête i*/
/*Requête j*/
/*Requête k*/
/*Requête l*/
