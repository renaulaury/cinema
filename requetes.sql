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
SELECT titre, YEAR(date_sortie_fr) AS annee, CONCAT(nom, prenom) AS reali
FROM film
INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
INNER JOIN personne ON realisateur.id_personne = personne.id_personne
ORDER BY nom ASC

/*Requête d*/
SELECT libelle_genre, COUNT(libelle_genre)
FROM genre_film
INNER JOIN genre ON genre_film.id_genre = genre.id_genre
INNER JOIN film ON genre_film.id_film = film.id_film
GROUP BY libelle_genre

/*Requête e*/
SELECT nom, prenom, COUNT(titre) AS nb_film
FROM film
INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
INNER JOIN personne ON realisateur.id_personne = personne.id_personne
GROUP BY nom, prenom
ORDER BY nb_film DESC

/*Requête f*/
/*Requête g*/
/*Requête h*/
/*Requête i*/
/*Requête j*/
/*Requête k*/
/*Requête l*/
