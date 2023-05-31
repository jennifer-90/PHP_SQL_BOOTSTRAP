-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 mai 2023 à 20:15
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `evalphp`
--
CREATE DATABASE IF NOT EXISTS `evalphp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `evalphp`;

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Belgique'),
(2, 'France'),
(3, 'Allemagne'),
(4, 'Pays-Bas'),
(5, 'Italie'),
(6, 'Espagne'),
(7, 'Royaume-Uni'),
(8, 'Luxembourg'),
(9, 'Suisse'),
(10, 'Portugal'),
(11, 'Norv'),
(12, 'Su'),
(13, 'Autriche'),
(14, 'Irlande');

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `course`
--

INSERT INTO `course` (`id`, `name`, `code`) VALUES
(1, 'Base des r', '1351'),
(2, 'Environnement et technologies du web', '1352'),
(3, 'SGBD (Syst', '1353'),
(4, 'Cr', '1354'),
(5, 'Approche Design', '1355'),
(6, 'CMS - niveau 1', '1356'),
(7, 'Initiation ', '1357'),
(8, 'Activit', '1358'),
(9, 'Scripts clients', '1359'),
(10, 'Scripts serveurs', '1360'),
(11, 'Framework et POO c', '1361'),
(12, 'Projet Web dynamique', '1362'),
(13, 'Veille technologique', '1363'),
(14, 'Epreuve int', '1364'),
(15, 'Anglais UE1', '1783'),
(16, 'Anglais UE2', '1784'),
(17, 'Initiation aux bases de donn', '1440'),
(18, 'Principes algorithmiques et programmation', '1442'),
(19, 'Programmation orient', '1443'),
(20, 'Web : principes de base', '1444'),
(21, 'Techniques de gestion de projet', '1448'),
(22, 'Principes d?analyse informatique', '1449'),
(23, 'El', '1755'),
(24, 'Structure des ordinateurs', '1808'),
(25, 'Gestion et exploitation de bases de donn', '1811'),
(26, 'Math', '1807'),
(27, 'Bases des r', '1323'),
(28, 'Projet d?analyse et de conception', '1450'),
(29, 'Information et communication professionnelle', '1754'),
(30, 'Produits logiciels de gestion int', '1438'),
(31, 'Administration, gestion et s', '1439'),
(32, 'Projet de d', '1446'),
(33, 'Stage d?int', '1451'),
(34, 'Projet d?int', '1447'),
(35, 'Activit', '1452'),
(36, 'Epreuve int', '1453');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `name`) VALUES
(1, 'BES Webdeveloper'),
(2, 'Bachelier en informatique de gestion');

-- --------------------------------------------------------

--
-- Structure de la table `formation_course`
--

DROP TABLE IF EXISTS `formation_course`;
CREATE TABLE IF NOT EXISTS `formation_course` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `formationid` bigint UNSIGNED NOT NULL,
  `courseid` bigint UNSIGNED NOT NULL,
  `period` tinyint UNSIGNED NOT NULL,
  `determinant` tinyint(1) NOT NULL DEFAULT '0',
  `prepreq` bigint UNSIGNED DEFAULT NULL,
  `teacher` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `formationid_2` (`formationid`,`courseid`),
  KEY `formationid` (`formationid`),
  KEY `courseid` (`courseid`),
  KEY `teacher` (`teacher`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `formation_course`
--

INSERT INTO `formation_course` (`id`, `formationid`, `courseid`, `period`, `determinant`, `prepreq`, `teacher`) VALUES
(1, 1, 1, 40, 0, NULL, NULL),
(2, 1, 2, 40, 0, NULL, NULL),
(3, 1, 3, 80, 0, NULL, NULL),
(4, 1, 4, 160, 1, 2, NULL),
(5, 1, 5, 80, 0, 2, NULL),
(6, 1, 6, 40, 0, 2, NULL),
(7, 1, 7, 40, 0, NULL, NULL),
(8, 1, 9, 120, 1, 7, NULL),
(9, 1, 10, 120, 1, 7, NULL),
(10, 1, 11, 80, 1, 7, NULL),
(11, 1, 12, 120, 1, 9, NULL),
(12, 1, 8, 240, 0, 4, NULL),
(13, 1, 13, 40, 1, NULL, NULL),
(14, 1, 16, 80, 0, 15, NULL),
(15, 1, 15, 80, 0, NULL, NULL),
(16, 1, 14, 120, 1, 11, NULL),
(17, 2, 17, 60, 0, NULL, NULL),
(18, 2, 25, 60, 0, 17, NULL),
(19, 2, 18, 120, 0, NULL, NULL),
(20, 2, 20, 40, 0, NULL, NULL),
(21, 2, 21, 40, 0, NULL, NULL),
(22, 2, 22, 60, 0, NULL, NULL),
(23, 2, 23, 40, 0, NULL, NULL),
(24, 2, 24, 60, 0, NULL, NULL),
(25, 2, 26, 60, 0, NULL, NULL),
(26, 2, 27, 80, 0, NULL, NULL),
(27, 2, 19, 120, 0, 19, NULL),
(28, 2, 28, 100, 0, NULL, NULL),
(29, 2, 16, 80, 0, NULL, NULL),
(30, 2, 29, 40, 0, NULL, NULL),
(31, 2, 30, 120, 0, NULL, NULL),
(32, 2, 31, 100, 1, NULL, NULL),
(33, 2, 32, 80, 1, 18, NULL),
(34, 2, 33, 120, 0, NULL, NULL),
(35, 2, 34, 60, 1, NULL, NULL),
(36, 2, 35, 240, 1, 35, NULL),
(37, 2, 36, 160, 1, 36, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'teacher'),
(3, 'student'),
(4, 'guest');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `lastlogin` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `country` (`country`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `pwd`, `email`, `country`, `status`, `lastlogin`, `created`) VALUES
(2, 'jen', '$2y$10$vL4BKHWBvfFU9tkW6uRqnuKf4eob4aWW5034BOxE2Nn9aMGnpO9cC', 'jen@gmail.com', NULL, 1, '2023-04-27 11:06:07', '2023-04-20 09:05:54'),
(8, 'Mary', '$2y$10$TcH3T3uO2c2CCNCp6hRtQ.GohYIW1x9VZjtmpkk5Y95RIyGX1glIa', 'Mary@gmail.com', NULL, 1, '2023-04-23 23:01:11', '2023-04-23 21:57:52'),
(9, 'Benoit', '$2y$10$TPGaw9Wz/9Q.z13iimIS.ePHfx9DSLgYARIjzwJq6oR3dzIw94cIi', 'Benoit@gmail.com', NULL, 1, NULL, '2023-04-23 22:43:45'),
(12, 'test', '$2y$10$evgCy4UvzKRY2VypWe/5wOUCtCH2Kf/ieRnevEpTc.iU0.PIF3LUO', 'test@test.be', 2, 1, '2023-04-24 14:57:29', '2023-04-24 11:15:42'),
(14, 'Laura', '$2y$10$//tOI1SpNZLTSwEyryPJPekiaVNTu2AgFfH1lvILGklmWNLwDNgNe', 'Laura@gmail.com', NULL, 1, NULL, '2023-05-07 18:00:08'),
(15, 'Bob', '$2y$10$g036nfEBnirkJ.BVdEFlSOAV9ZGkg0tCmxp.m5AcbGanhTODORiri', 'bob@gmail.com', NULL, 1, NULL, '2023-05-08 00:42:21'),
(16, 'Toulouse', '$2y$10$zTPeJ.kZMhHJZUT25dXSIuDKZHHTymXpRDUiCQYDjp1rFPsRNHGkS', 'Toulouse@gmail.com', NULL, 1, NULL, '2023-05-08 21:25:45'),
(17, 'Mathéo', '$2y$10$o1nkBle/5WZXMsg89SXTuekBpZuT.5Q0bOpYgjEuUStydwYJG1iRa', 'Matheo@gmail.com', NULL, 1, NULL, '2023-05-08 21:27:30'),
(18, 'Xavier', '$2y$10$nltvlvzFqEk7ml7PMCYmUuIHiJl9nPUs1kgy2vDrM212HirR77lRC', 'Xavier@gmail.com', NULL, 1, NULL, '2023-05-08 21:28:47'),
(19, 'Adrien', '$2y$10$l39llunyEV9jJcyYAhv8X.vjpK2m0yuQRdAyeVLiy03AkyCt6mIsu', 'Adrien@gmail.com', NULL, 1, NULL, '2023-05-08 21:32:12');

-- --------------------------------------------------------

--
-- Structure de la table `user_course`
--

DROP TABLE IF EXISTS `user_course`;
CREATE TABLE IF NOT EXISTS `user_course` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint UNSIGNED NOT NULL,
  `courseid` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `courseid` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint UNSIGNED NOT NULL,
  `roleid` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `roleid` (`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formation_course`
--
ALTER TABLE `formation_course`
  ADD CONSTRAINT `formation_course_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `formation_course_ibfk_2` FOREIGN KEY (`formationid`) REFERENCES `formation` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`country`) REFERENCES `country` (`id`);

--
-- Contraintes pour la table `user_course`
--
ALTER TABLE `user_course`
  ADD CONSTRAINT `user_course_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `user_course_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
