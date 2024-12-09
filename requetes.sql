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

/*Requête d*/
SELECT libelle_genre, COUNT(genre_film.id_film) AS libelle
FROM genre_film
INNER JOIN genre ON genre_film.id_genre = genre.id_genre
INNER JOIN film ON genre_film.id_film = film.id_film
GROUP BY genre.id_genre

/*Requête e*/
SELECT nom, prenom, COUNT(film.id_realisateur) AS nb_film
FROM film
INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
INNER JOIN personne ON realisateur.id_personne = personne.id_personne
GROUP BY personne.id_personne
ORDER BY nb_film DESC

/*Requête f*/
SELECT titre, nom, prenom, sexe, personnage
FROM casting
INNER JOIN film ON casting.id_film = film.id_film
INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
INNER JOIN personne ON acteur.id_personne = personne.id_personne
INNER JOIN role ON casting.id_role = role.id_role
WHERE film.id_film = 1

/*Requête g*/
SELECT personne.id_personne, CONCAT(personne.nom, " ", personne.prenom) AS name_actor, titre, personnage, date_sortie_fr
FROM casting
INNER JOIN film ON casting.id_film = film.id_film
INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
INNER JOIN personne ON acteur.id_personne = personne.id_personne
INNER JOIN role ON casting.id_role = role.id_role
WHERE acteur.id_acteur = 2

/*Requête h*/
SELECT CONCAT(personne.nom, " ", personne.prenom) AS personnalite, film.titre
FROM casting
INNER JOIN film ON casting.id_film = film.id_film
INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
INNER JOIN personne ON acteur.id_personne = personne.id_personne
WHERE realisateur.id_personne = acteur.id_personne 

/*Requête i - inférieur à 15 pour avoir un résultat*/
SELECT titre, YEAR(date_sortie_fr) AS annee , YEAR(CURDATE()) AS today, (YEAR(CURDATE()) -  YEAR(date_sortie_fr)) AS annee_ecoule
FROM film
WHERE (YEAR(CURDATE()) -  YEAR(date_sortie_fr)) < 15
GROUP BY film.id_film 
ORDER BY annee_ecoule AS

/*Requête j*/
SELECT sexe, COUNT(acteur.id_personne) AS nb
FROM personne
INNER JOIN acteur ON personne.id_personne = acteur.id_personne
GROUP BY sexe

/*Requête k*/

/*Requête l*/
