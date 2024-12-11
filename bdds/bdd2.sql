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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.acteur : ~26 rows (environ)
REPLACE INTO `acteur` (`id_acteur`, `id_personne`) VALUES
	(2, 2),
	(3, 3),
	(4, 4),
	(5, 5),
	(6, 6),
	(7, 7),
	(1, 8),
	(8, 8),
	(9, 9),
	(10, 10),
	(11, 11),
	(12, 12),
	(13, 13),
	(14, 14),
	(15, 15),
	(16, 16),
	(17, 17),
	(18, 18),
	(23, 18),
	(19, 19),
	(20, 20),
	(25, 20),
	(21, 21),
	(22, 25),
	(24, 25),
	(26, 30);

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

-- Listage des données de la table cinema.casting : ~31 rows (environ)
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
	(6, 25, 26),
	(8, 7, 34),
	(8, 26, 35);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.film : ~8 rows (environ)
REPLACE INTO `film` (`id_film`, `titre`, `date_sortie_fr`, `duree`, `synopsis`, `note`, `affiche`, `id_realisateur`) VALUES
	(1, 'Inception', '2010-07-16', 148, 'Dom Cobb est un expert en extraction, une technique qui permet d\'entrer dans les rêves d\'autres personnes pour voler des informations secrètes. Il se voit offrir une chance de rédemption s\'il réussit à implanter une idée dans l\'esprit d\'un homme. Le film navigue entre réalité et rêve.', 5, 'https://m.media-amazon.com/images/I/912AErFSBHL._AC_UF1000,1000_QL80_.jpg', 17),
	(2, 'The dark Knight', '2008-07-18', 152, ' Batman lutte contre le Joker, un criminel anarchiste qui menace Gotham City. Le film explore des thèmes de moralité, de sacrifice et de justice.', 5, 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/63/97/89/18949761.jpg', 17),
	(3, 'Batman Begins', '2005-06-15', 140, 'Le film retrace l\'origine de Batman, de la tragédie de ses parents à son entraînement dans les arts martiaux et la bataille contre la corruption de Gotham.', 3, 'https://fr.web.img6.acsta.net/c_310_420/pictures/22/10/04/08/52/2484953.jpg', 17),
	(4, 'The prestige', '2006-10-20', 130, 'Deux magiciens rivaux se battent pour créer le meilleur tour de magie, entraînant des conséquences dramatiques. Le film explore les thèmes du sacrifice, de la rivalité et de l\'illusion.', 3, 'https://m.media-amazon.com/images/I/81AdI6L6nAL._AC_UF894,1000_QL80_.jpg', 17),
	(5, 'Shutter Island', '2010-02-19', 218, 'Teddy Daniels, un marshal américain, enquête sur la disparition d\'une patiente d\'un hôpital psychiatrique sur une île isolée, mais découvre des secrets effrayants et une réalité perturbée.', 2, 'https://m.media-amazon.com/images/S/pv-target-images/e9e06e8df973a8eb8503834bc109ffc68937407224bd204870e7ba829154a668.jpg', 18),
	(6, 'The revenant', '2016-01-08', 156, 'Après avoir été attaqué par un ours et laissé pour mort, Hugh Glass lutte pour survivre et se venger de ceux qui l’ont trahi.', 1, 'https://fr.web.img3.acsta.net/pictures/15/11/10/09/30/165611.jpg', 20),
	(7, 'Inglourious Basterds', '2009-08-21', 153, 'Un groupe de soldats juifs américains se lance dans une mission secrète pour éliminer des nazis pendant la Seconde Guerre mondiale, mais leurs chemins croisent celui d\'une jeune femme déterminée à venger sa famille.', 1, 'https://static.thcdn.com/images/large/original//productimg/1600/1600/10064866-1334918500666213.jpg', 19),
	(8, 'Le petit tailleur', '2009-05-10', 15, 'Un tailleur se perd dans les émotions suscitées par son métier, créant des pièces pour d\'autres tout en étant étranger à ses propres désirs.', 0, 'https://www.radiofrance.fr/s3/cruiser-production/2023/04/defb963b-a79b-4338-a88d-ade4af6ade1d/400x400_sc_fm-l-histoire-du-petit-tailleur-e-pisode1.jpg', 21);

-- Listage de la structure de table cinema. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `libelle_genre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.genre : ~10 rows (environ)
REPLACE INTO `genre` (`id_genre`, `libelle_genre`) VALUES
	(1, 'Science-Fiction'),
	(2, 'Thriller'),
	(3, 'Action'),
	(4, 'Crime'),
	(5, 'Drame'),
	(6, 'Aventure'),
	(7, 'Western'),
	(8, 'Historique'),
	(9, 'Comédie'),
	(10, 'Psychologique');

-- Listage de la structure de table cinema. genre_film
CREATE TABLE IF NOT EXISTS `genre_film` (
  `id_film` int NOT NULL,
  `id_genre` int NOT NULL,
  KEY `id_film` (`id_film`),
  KEY `id_genre` (`id_genre`),
  CONSTRAINT `FK1_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK2_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.genre_film : ~19 rows (environ)
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
	(7, 9),
	(8, 5),
	(8, 10);

-- Listage de la structure de table cinema. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `date_naissance` date NOT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.personne : ~29 rows (environ)
REPLACE INTO `personne` (`id_personne`, `nom`, `prenom`, `sexe`, `date_naissance`, `photo`) VALUES
	(1, 'Nolan', 'Christopher', 'M', '1970-07-30', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Christopher_Nolan_Cannes_2018.jpg/260px-Christopher_Nolan_Cannes_2018.jpg'),
	(2, 'DiCaprio', 'Leornardo', 'M', '1974-11-11', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Leonardo_Dicaprio_Cannes_2019.jpg/250px-Leonardo_Dicaprio_Cannes_2019.jpg'),
	(3, 'Gordon-Levitt', 'Joseph', 'M', '1981-02-17', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Joseph_Gordon-Levitt_TechCrunch_Disrupt_San_Francisco_2019_-_Day_1_%28cropped%29.jpeg/220px-Joseph_Gordon-Levitt_TechCrunch_Disrupt_San_Francisco_2019_-_Day_1_%28cropped%29.jpeg'),
	(4, 'Page', 'Elliot', 'F', '1987-02-21', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/2023_National_Book_Festival_%2853122454007%29_%28cropped%29.jpg/220px-2023_National_Book_Festival_%2853122454007%29_%28cropped%29.jpg'),
	(5, 'Hardy', 'Tom', 'M', '1977-09-15', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/43/Tom_Hardy_by_Gage_Skidmore.jpg/260px-Tom_Hardy_by_Gage_Skidmore.jpg'),
	(6, 'Murphy', 'Cillian', 'M', '1976-05-25', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Cillian_Murphy_at_Berlinale_2024%2C_Ausschnitt.jpg/220px-Cillian_Murphy_at_Berlinale_2024%2C_Ausschnitt.jpg'),
	(7, 'Cottillard', 'Marion', 'F', '1975-09-30', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/Marion_Cotillard_at_2019_Cannes.jpg/220px-Marion_Cotillard_at_2019_Cannes.jpg'),
	(8, 'Bale', 'Christian', 'M', '1974-01-30', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/94/MJK_35690_Christian_Bale_%28Vice%2C_Berlinale_2019%29.jpg/220px-MJK_35690_Christian_Bale_%28Vice%2C_Berlinale_2019%29.jpg'),
	(9, 'Ledger', 'Heath', 'M', '1979-04-04', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Heath_Ledger.jpg/260px-Heath_Ledger.jpg'),
	(10, 'Caine', 'Michael', 'M', '1933-03-14', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Sir_Michael_Caine%2C_28th_EFA_Awards_2015%2C_Berlin_%28cropped%29.jpg/260px-Sir_Michael_Caine%2C_28th_EFA_Awards_2015%2C_Berlin_%28cropped%29.jpg'),
	(11, 'Oldmann', 'Gary', 'M', '1958-03-21', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Gary_Oldman_Cannes_2018.jpg/220px-Gary_Oldman_Cannes_2018.jpg'),
	(12, 'Eckhart', 'Aaron', 'M', '1968-03-12', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Aaron_Eckhart_%2829830286295%29_%28cropped%29.jpg/260px-Aaron_Eckhart_%2829830286295%29_%28cropped%29.jpg'),
	(13, 'Neeson', 'Liam', 'M', '1952-06-07', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/Liam_Neeson_Deauville_2012.jpg/240px-Liam_Neeson_Deauville_2012.jpg'),
	(14, 'Holmes', 'Katie', 'F', '1978-12-18', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/45/Katie_Holmes_2011_%286024619824%29.jpg/260px-Katie_Holmes_2011_%286024619824%29.jpg'),
	(15, 'Jackman', 'Hugh', 'M', '1968-10-12', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Hugh_Jackman_by_Gage_Skidmore_3.jpg/220px-Hugh_Jackman_by_Gage_Skidmore_3.jpg'),
	(16, 'Johansson', 'Scarlett', 'F', '1984-11-22', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Scarlett_Johansson_by_Gage_Skidmore_2_%28cropped%2C_2%29.jpg/220px-Scarlett_Johansson_by_Gage_Skidmore_2_%28cropped%2C_2%29.jpg'),
	(17, 'Hall', 'Rebecca', 'F', '1982-05-19', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Rebecca_Hall_Berlinale_2010_cropped.jpg/260px-Rebecca_Hall_Berlinale_2010_cropped.jpg'),
	(18, 'Ruffalo', 'Marc', 'M', '1967-11-22', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Mark_Ruffalo_in_2017_by_Gage_Skidmore.jpg/260px-Mark_Ruffalo_in_2017_by_Gage_Skidmore.jpg'),
	(19, 'Kingsley', 'Ben', 'M', '1943-12-31', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Sir_Ben_Kingsley_2012.jpg/220px-Sir_Ben_Kingsley_2012.jpg'),
	(20, 'Williams', 'Michelle', 'F', '1980-09-09', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/67/Michelle_Williams_2012_Shankbone_3_%28cropped%29.JPG/290px-Michelle_Williams_2012_Shankbone_3_%28cropped%29.JPG'),
	(21, 'Von Sydow', 'Max', 'M', '1929-04-10', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Max_von_Sydow_Cannes_2016.jpg/220px-Max_von_Sydow_Cannes_2016.jpg'),
	(22, 'Scorcese', 'Martin', 'M', '1942-11-17', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Martin_Scorsese_Berlinale_2010_%28cropped2%29.jpg/260px-Martin_Scorsese_Berlinale_2010_%28cropped2%29.jpg'),
	(23, 'Gonzalez Inarritu', 'Alejandro', 'M', '1963-08-15', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Alejandro_Gonz%C3%A1lez_I%C3%B1%C3%A1rritu_2014.jpg/260px-Alejandro_Gonz%C3%A1lez_I%C3%B1%C3%A1rritu_2014.jpg'),
	(25, 'Poulter', 'Will', 'M', '1993-10-28', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1e/Will_Poulter_2016.jpg/220px-Will_Poulter_2016.jpg'),
	(26, 'Tarantino', 'Quentin', 'M', '1963-03-21', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Quentin_Tarantino_by_Gage_Skidmore.jpg/220px-Quentin_Tarantino_by_Gage_Skidmore.jpg'),
	(27, 'Pitt', 'Brad', 'M', '1963-10-04', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Brad_Pitt-69858.jpg/240px-Brad_Pitt-69858.jpg'),
	(28, 'Kruger', 'Diane', 'F', '1976-07-15', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Diane_Kruger-5300_%28cropped%29.jpg/220px-Diane_Kruger-5300_%28cropped%29.jpg'),
	(29, 'Laurent', 'Mélanie', 'F', '1983-02-21', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/M%C3%A9lanie_Laurent_C%C3%A9sar_2016_infobox.jpg/220px-M%C3%A9lanie_Laurent_C%C3%A9sar_2016_infobox.jpg'),
	(30, 'Duvauchelle', 'Nicolas', 'M', '1980-03-27', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/Nicolas_Duvauchelle_2012.jpg/220px-Nicolas_Duvauchelle_2012.jpg');

-- Listage de la structure de table cinema. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_realisateur`),
  KEY `id_personne` (`id_personne`),
  CONSTRAINT `FK1_personn` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.realisateur : ~5 rows (environ)
REPLACE INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(17, 1),
	(21, 7),
	(18, 22),
	(20, 23),
	(19, 26);

-- Listage de la structure de table cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `personnage` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.role : ~35 rows (environ)
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
	(33, 'Donny Donowitz'),
	(34, 'La femme'),
	(35, 'Le tailleur');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
