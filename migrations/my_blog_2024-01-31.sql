-- --------------------------------------------------------
-- Host:                         localhost
-- Versione server:              5.7.14 - MySQL Community Server (GPL)
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database my_blog
CREATE DATABASE IF NOT EXISTS `my_blog` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `my_blog`;

-- Dump della struttura di tabella my_blog.categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titolo` varchar(100) NOT NULL DEFAULT '',
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella my_blog.categorie: ~0 rows (circa)
INSERT INTO `categorie` (`id`, `titolo`, `parent`) VALUES
	(1, 'aaa', NULL);

-- Dump della struttura di tabella my_blog.commenti
CREATE TABLE IF NOT EXISTS `commenti` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL DEFAULT '0',
  `autore_id` varchar(40) NOT NULL DEFAULT '',
  `testo` varchar(255) NOT NULL DEFAULT '',
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella my_blog.commenti: ~0 rows (circa)
INSERT INTO `commenti` (`id`, `post_id`, `autore_id`, `testo`, `data`) VALUES
	(1, 1, '2', 'ma va là', '2024-01-15 10:16:58');

-- Dump della struttura di tabella my_blog.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autore_id` varchar(40) NOT NULL DEFAULT '',
  `titolo` varchar(100) NOT NULL DEFAULT '',
  `testo` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella my_blog.posts: ~2 rows (circa)
INSERT INTO `posts` (`id`, `autore_id`, `titolo`, `testo`, `created`, `updated`) VALUES
	(1, '1', 'Benventui nel blog', 'Praesent non turpis. Vivamus ultricies erat feugiat tellus. Phasellus porta. Phasellus augue. Nulla facilisi. Suspendisse tortor mauris, ultricies vel, vestibulum sit amet, dignissim dapibus, leo. Suspendisse sed pede varius nisl pharetra sagittis.', '2024-01-14 23:00:00', '2024-01-31 09:29:13'),
	(2, '3', 'Linguaggi lato server', 'Fusce est turpis, dapibus sit amet, tincidunt ut, volutpat ut, mauris. Cras tincidunt aliquet odio. Vivamus fermentum felis at nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. ', '2024-01-15 10:30:17', '2024-01-31 09:29:24');

-- Dump della struttura di tabella my_blog.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella my_blog.users: 4 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `nickname`) VALUES
	(1, 'admin', '12345', 'Zeus'),
	(2, 'pincopallino', '112233', 'pinco'),
	(3, 'danilofolli', '$2y$10$.bGU4qj6wMq.DavJBy46BO5CG93fsJeSAqFpIiu2jf8Bco8b0YwOy', 'alibaba'),
	(4, 'danilofolli1', '$2y$10$rPubFYEi2rQa1vAS/chWP.TjXG8kAIKlFeBObHDTGA182z/DwyPj2', 'alibaba1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
