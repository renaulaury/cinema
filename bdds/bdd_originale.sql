-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinema
CREATE DATABASE IF NOT EXISTS `cinema` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema`;

-- Listage de la structure de table cinema. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_acteur`),
  KEY `id_personne` (`id_personne`),
  CONSTRAINT `FK1_person` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.acteur : ~25 rows (environ)
REPLACE INTO `acteur` (`id_acteur`, `id_personne`) VALUES
	(4, 2),
	(6, 3),
	(20, 4),
	(8, 5),
	(16, 6),
	(17, 6),
	(3, 7),
	(1, 8),
	(15, 9),
	(2, 10),
	(19, 11),
	(5, 12),
	(18, 13),
	(9, 14),
	(10, 15),
	(11, 16),
	(7, 17),
	(23, 18),
	(12, 19),
	(25, 20),
	(24, 21),
	(22, 25),
	(21, 27),
	(13, 28),
	(14, 29);

-- Listage de la structure de table cinema. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int NOT NULL,
  `id_acteur` int NOT NULL,
  `id_role` int NOT NULL,
  KEY `id_film` (`id_film`),
  KEY `id_acteur` (`id_acteur`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `FK1_movie` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK2_actor` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `FK3_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.casting : ~29 rows (environ)
REPLACE INTO `casting` (`id_film`, `id_acteur`, `id_role`) VALUES
	(1, 2, 1),
	(1, 3, 2),
	(1, 4, 3),
	(1, 5, 4),
	(1, 6, 5),
	(1, 7, 6),
	(5, 2, 7),
	(5, 18, 8),
	(5, 19, 9),
	(5, 20, 10),
	(5, 21, 11),
	(2, 8, 12),
	(2, 9, 13),
	(2, 10, 14),
	(2, 12, 15),
	(2, 11, 16),
	(3, 8, 12),
	(3, 10, 14),
	(3, 13, 17),
	(3, 14, 18),
	(3, 11, 16),
	(4, 8, 19),
	(4, 15, 20),
	(4, 10, 21),
	(4, 16, 22),
	(4, 17, 23),
	(6, 2, 24),
	(6, 24, 25),
	(6, 25, 26);

-- Listage de la structure de table cinema. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `date_sortie_fr` date NOT NULL,
  `duree` int NOT NULL,
  `synopsis` text NOT NULL,
  `note` int NOT NULL,
  `affiche` text NOT NULL,
  `id_realisateur` int NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `id_realisateur` (`id_realisateur`),
  CONSTRAINT `FK1_real` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.film : ~7 rows (environ)
REPLACE INTO `film` (`id_film`, `titre`, `date_sortie_fr`, `duree`, `synopsis`, `note`, `affiche`, `id_realisateur`) VALUES
	(1, 'Inception', '2010-07-16', 148, 'Dom Cobb est un expert en extraction, une technique qui permet d\'entrer dans les rêves d\'autres personnes pour voler des informations secrètes. Il se voit offrir une chance de rédemption s\'il réussit à implanter une idée dans l\'esprit d\'un homme. Le film navigue entre réalité et rêve.', 5, 'https://m.media-amazon.com/images/I/912AErFSBHL._AC_UF1000,1000_QL80_.jpg', 17),
	(2, 'The dark Knight', '2008-07-18', 152, ' Batman lutte contre le Joker, un criminel anarchiste qui menace Gotham City. Le film explore des thèmes de moralité, de sacrifice et de justice.', 5, 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/63/97/89/18949761.jpg', 17),
	(3, 'Batman Begins', '2005-06-15', 140, 'Le film retrace l\'origine de Batman, de la tragédie de ses parents à son entraînement dans les arts martiaux et la bataille contre la corruption de Gotham.', 3, 'https://fr.web.img6.acsta.net/c_310_420/pictures/22/10/04/08/52/2484953.jpg', 17),
	(4, 'The prestige', '2006-10-20', 130, 'Deux magiciens rivaux se battent pour créer le meilleur tour de magie, entraînant des conséquences dramatiques. Le film explore les thèmes du sacrifice, de la rivalité et de l\'illusion.', 3, 'https://m.media-amazon.com/images/I/81AdI6L6nAL._AC_UF894,1000_QL80_.jpg', 17),
	(5, 'Shutter Island', '2010-02-19', 19, 'Teddy Daniels, un marshal américain, enquête sur la disparition d\'une patiente d\'un hôpital psychiatrique sur une île isolée, mais découvre des secrets effrayants et une réalité perturbée.', 2, 'https://m.media-amazon.com/images/S/pv-target-images/e9e06e8df973a8eb8503834bc109ffc68937407224bd204870e7ba829154a668.jpg', 18),
	(6, 'The revenant', '2016-01-08', 156, 'Après avoir été attaqué par un ours et laissé pour mort, Hugh Glass lutte pour survivre et se venger de ceux qui l’ont trahi.', 1, 'https://fr.web.img3.acsta.net/pictures/15/11/10/09/30/165611.jpg', 20),
	(7, 'Inglourious Basterds', '2009-08-21', 153, 'Un groupe de soldats juifs américains se lance dans une mission secrète pour éliminer des nazis pendant la Seconde Guerre mondiale, mais leurs chemins croisent celui d\'une jeune femme déterminée à venger sa famille.', 1, 'https://static.thcdn.com/images/large/original//productimg/1600/1600/10064866-1334918500666213.jpg', 19);

-- Listage de la structure de table cinema. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `libelle_genre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.genre : ~9 rows (environ)
REPLACE INTO `genre` (`id_genre`, `libelle_genre`) VALUES
	(1, 'Science-Fiction'),
	(2, 'Thriller'),
	(3, 'Action'),
	(4, 'Crime'),
	(5, 'Drame'),
	(6, 'Aventure'),
	(7, 'Western'),
	(8, 'Historique'),
	(9, 'Comédie');

-- Listage de la structure de table cinema. genre_film
CREATE TABLE IF NOT EXISTS `genre_film` (
  `id_film` int NOT NULL,
  `id_genre` int NOT NULL,
  KEY `id_film` (`id_film`),
  KEY `id_genre` (`id_genre`),
  CONSTRAINT `FK1_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK2_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.genre_film : ~17 rows (environ)
REPLACE INTO `genre_film` (`id_film`, `id_genre`) VALUES
	(1, 1),
	(1, 2),
	(5, 2),
	(2, 3),
	(3, 3),
	(7, 3),
	(2, 4),
	(7, 4),
	(2, 5),
	(3, 5),
	(4, 5),
	(5, 5),
	(6, 5),
	(7, 5),
	(6, 6),
	(6, 7),
	(7, 9);

-- Listage de la structure de table cinema. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `date_naissance` date NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.personne : ~29 rows (environ)
REPLACE INTO `personne` (`id_personne`, `nom`, `prenom`, `sexe`, `date_naissance`) VALUES
	(1, 'Nolan', 'Christopher', 'M', '1970-07-30'),
	(2, 'DiCaprio', 'Leornardo', 'M', '1974-11-11'),
	(3, 'Gordon-Levitt', 'Joseph', 'M', '1981-02-17'),
	(4, 'Page', 'Ellen', 'F', '1987-02-21'),
	(5, 'Hardy', 'Tom', 'M', '1977-09-15'),
	(6, 'Murphy', 'Cillian', 'M', '1976-05-25'),
	(7, 'Cottillard', 'Marion', 'F', '1975-09-30'),
	(8, 'Bale', 'Christian', 'M', '1974-01-30'),
	(9, 'Ledger', 'Heath', 'M', '1979-04-04'),
	(10, 'Caine', 'Michael', 'M', '1933-03-14'),
	(11, 'Oldmann', 'Gary', 'M', '1958-03-21'),
	(12, 'Eckhart', 'Aaron', 'M', '1968-03-12'),
	(13, 'Neeson', 'Liam', 'M', '1952-06-07'),
	(14, 'Holmes', 'Katie', 'F', '1978-12-18'),
	(15, 'Jackman', 'Hugh', 'M', '1968-10-12'),
	(16, 'Johansson', 'Scarlett', 'F', '1984-11-22'),
	(17, 'Hall', 'Rebecca', 'F', '1982-05-19'),
	(18, 'Ruffalo', 'Marc', 'M', '1967-11-22'),
	(19, 'Kingsley', 'Ben', 'M', '1943-12-31'),
	(20, 'Williams', 'Michelle', 'F', '1980-09-09'),
	(21, 'Von Sydow', 'Max', 'M', '1929-04-10'),
	(22, 'Scorcese', 'Martin', 'M', '1942-11-17'),
	(23, 'Gonzalez Inarritu', 'Alejandro', 'M', '1963-08-15'),
	(24, 'Hardy', 'Tom', 'M', '1977-09-15'),
	(25, 'Poulter', 'Will', 'M', '1993-10-28'),
	(26, 'Tarantino', 'Quentin', 'M', '1963-03-21'),
	(27, 'Pitt', 'Brad', 'M', '1963-10-04'),
	(28, 'Kruger', 'Diane', 'F', '1976-07-15'),
	(29, 'Laurent', 'Mélanie', 'F', '1983-02-21');

-- Listage de la structure de table cinema. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_realisateur`),
  KEY `id_personne` (`id_personne`),
  CONSTRAINT `FK1_personn` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.realisateur : ~4 rows (environ)
REPLACE INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(17, 1),
	(18, 22),
	(20, 23),
	(19, 26);

-- Listage de la structure de table cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `personnage` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.role : ~33 rows (environ)
REPLACE INTO `role` (`id_role`, `personnage`) VALUES
	(1, 'Dom Cobb'),
	(2, 'Arthur'),
	(3, 'Ariane'),
	(4, 'Eames'),
	(5, 'Robert Fisher'),
	(6, 'Mal Cobb'),
	(7, 'Teddy Daniels'),
	(8, 'Chuck Aule'),
	(9, 'Dr John Cawley'),
	(10, 'Dolores Chanal'),
	(11, 'Dr Naehring'),
	(12, 'Bruce Wayne / Batman'),
	(13, 'The joker'),
	(14, 'Alfred Pennyworth'),
	(15, 'Harvey Dent'),
	(16, 'James Gordon'),
	(17, 'Ra\'s al Ghul'),
	(18, 'Rachel Dawes'),
	(19, 'Robert Angier'),
	(20, 'Alfred Borden'),
	(21, 'Cutter'),
	(22, 'Olivia Wenscombe'),
	(23, 'Sarah Borden'),
	(24, 'Hugh Glass'),
	(25, 'John Fitzgerald'),
	(26, 'Jim Bridger'),
	(27, 'Andrew Henry'),
	(28, 'Anderson'),
	(29, 'Lt. Aldo Raine'),
	(30, 'Col. Hans Landa'),
	(31, 'Bridget von Hammersmark'),
	(32, 'Shosanna Dreyfus'),
	(33, 'Donny Donowitz');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
