/*Requête a*/
SELECT titre, YEAR(date_sortie_fr), TIME_FORMAT(SEC_TO_TIME(duree * 60), '%H:%i') AS duree_film, prenom, nom
FROM film
INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
INNER JOIN personne ON realisateur.id_personne = personne.id_personne

/*Requête b*/
SELECT titre, round(duree)
FROM film
WHERE duree > 215 
ORDER BY duree DESC

/*Requête c*/
SELECT titre, YEAR(date_sortie_fr) AS annee, CONCAT(nom, " ",prenom) AS reali
FROM film
INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
INNER JOIN personne ON realisateur.id_personne = personne.id_personne
ORDER BY nom ASC

/*Requête d*/
SELECT libelle_genre, COUNT(genre_film.id_film) AS libelle
FROM genre_film
INNER JOIN genre ON genre_film.id_genre = genre.id_genre
INNER JOIN film ON genre_film.id_film = film.id_film
GROUP BY genre.libelle_genre

/*Requête e*/
SELECT nom, prenom, COUNT(film.id_realisateur) AS nb_film
FROM film
INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
INNER JOIN personne ON realisateur.id_personne = personne.id_personne
GROUP BY personne.nom, personne.prenom
ORDER BY nb_film DESC

/*Requête f*/
SELECT titre, nom, prenom, sexe
FROM casting
INNER JOIN film ON casting.id_film = film.id_film
INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
INNER JOIN personne ON acteur.id_personne = personne.id_personne
WHERE film.id_film = 1

/*Requête g*/
SELECT personne.id_personne, CONCAT(personne.nom, " ", personne.prenom) AS name_actor, titre, personnage, date_sortie_fr
FROM casting
INNER JOIN film ON casting.id_film = film.id_film
INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
INNER JOIN personne ON acteur.id_personne = personne.id_personne
INNER JOIN role ON casting.id_role = role.id_role
WHERE personne.id_personne = 2

/*Requête h*/

/*Requête i*/
/*Requête j*/
/*Requête k*/
/*Requête l*/
