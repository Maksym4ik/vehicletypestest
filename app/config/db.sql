
-- mySql 8.0.24
-- version PHP: 8.0.6
--
-- Database: `vehicle_db`
--

-- --------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

INSERT INTO `user_roles` (`id`, `name`) VALUES ('1', 'user'), ('2', 'admin');

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role_id` int DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

INSERT INTO `users` (`id`, `email`, `password`, `user_role_id`) VALUES
(1, 'admin@email.com', '$2y$10$rPCMspmuNzaN0tM67A61WOQayb.7b4Oh80kwEjLsIW1RC9zrUzDbS', 2),
(2, 'user@email.com', '$2y$10$rPCMspmuNzaN0tM67A61WOQayb.7b4Oh80kwEjLsIW1RC9zrUzDbS', 1);

DROP TABLE IF EXISTS `vehicle_types`;
CREATE TABLE IF NOT EXISTS `vehicle_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
COMMIT;