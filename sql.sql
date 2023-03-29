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


-- Listage de la structure de la base pour gestionstock
DROP DATABASE IF EXISTS `gestionstock`;
CREATE DATABASE IF NOT EXISTS `gestionstock` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gestionstock`;

-- Listage de la structure de table gestionstock. affectations
DROP TABLE IF EXISTS `affectations`;
CREATE TABLE IF NOT EXISTS `affectations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dateReception` datetime NOT NULL,
  `emergentReception` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateRetour` datetime DEFAULT NULL,
  `motifRetour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numInventaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `demande_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `affectations_demande_id_foreign` (`demande_id`),
  CONSTRAINT `affectations_demande_id_foreign` FOREIGN KEY (`demande_id`) REFERENCES `demandes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=228 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.affectations : ~39 rows (environ)
INSERT INTO `affectations` (`id`, `dateReception`, `emergentReception`, `dateRetour`, `motifRetour`, `numInventaire`, `etat`, `demande_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(15, '2023-03-14 09:46:00', 'gg', NULL, NULL, NULL, 'bien', 20, '2023-03-14 07:46:51', '2023-03-19 21:56:36', '2023-03-19 21:56:36'),
	(16, '2023-03-14 09:48:00', 'emergent', NULL, NULL, NULL, 'bien', 22, '2023-03-14 07:48:24', '2023-03-19 21:56:45', '2023-03-19 21:56:45'),
	(17, '2023-03-14 09:48:00', 'emergent', NULL, NULL, NULL, 'bien', 22, '2023-03-14 07:49:39', '2023-03-20 13:39:01', '2023-03-20 13:39:01'),
	(18, '2023-03-27 09:48:00', 'emergent', '2023-03-27 12:07:00', 'ok', '89', 'bien', 22, '2023-03-14 07:50:59', '2023-03-27 13:56:46', '2023-03-27 13:56:46'),
	(19, '2023-03-14 09:51:00', 'h', NULL, NULL, NULL, 'nn', 29, '2023-03-14 07:52:08', '2023-03-27 14:28:04', '2023-03-27 14:28:04'),
	(20, '2023-03-14 09:51:00', 'h', NULL, NULL, NULL, 'nn', 29, '2023-03-14 07:53:34', '2023-03-27 16:24:20', '2023-03-27 16:24:20'),
	(21, '2023-03-14 09:56:00', 'BBbbbb', '2023-03-27 21:04:00', 'OK', NULL, 'BB', 30, '2023-03-14 07:56:18', '2023-03-27 21:04:19', NULL),
	(22, '2023-03-14 09:58:00', 'bb', NULL, NULL, NULL, 'bb', 23, '2023-03-14 07:58:49', '2023-03-14 07:58:49', NULL),
	(23, '2023-03-14 10:01:00', 'pPPPP', '2023-03-27 13:55:00', 'ok', '89', 'ok', 24, '2023-03-14 08:01:37', '2023-03-27 13:55:45', NULL),
	(24, '2023-03-14 10:01:00', 'pk', NULL, NULL, NULL, 'ok', 24, '2023-03-14 08:09:27', '2023-03-14 08:09:27', NULL),
	(25, '2023-03-14 10:01:00', 'pk', NULL, NULL, NULL, 'ok', 24, '2023-03-14 08:12:28', '2023-03-14 08:12:28', NULL),
	(26, '2023-03-14 10:01:00', 'pk', NULL, NULL, NULL, 'ok', 24, '2023-03-14 08:16:18', '2023-03-14 08:16:18', NULL),
	(27, '2023-03-14 10:01:00', 'pk', NULL, NULL, NULL, 'ok', 24, '2023-03-14 08:18:31', '2023-03-14 08:18:31', NULL),
	(28, '2023-03-14 10:01:00', 'pk', NULL, NULL, NULL, 'ok', 24, '2023-03-14 08:33:06', '2023-03-14 08:33:06', NULL),
	(29, '2023-03-14 10:01:00', 'pk', NULL, NULL, NULL, 'ok', 24, '2023-03-14 08:46:26', '2023-03-14 08:46:26', NULL),
	(30, '2023-03-14 10:59:00', 'bb', NULL, NULL, NULL, 'bb', 25, '2023-03-14 08:59:41', '2023-03-14 08:59:41', NULL),
	(31, '2023-03-14 13:20:00', 'PK', NULL, NULL, NULL, 'BIEN', 26, '2023-03-14 11:21:08', '2023-03-14 11:21:08', NULL),
	(32, '2023-03-14 13:22:00', 'ok', NULL, NULL, NULL, 'ok', 27, '2023-03-14 11:22:45', '2023-03-14 11:22:45', NULL),
	(33, '2023-03-14 13:29:00', 'ok', NULL, NULL, NULL, 'ok', 28, '2023-03-14 11:29:27', '2023-03-14 11:29:27', NULL),
	(34, '2023-03-16 11:27:00', 'bb', NULL, NULL, NULL, 'nnn', 31, '2023-03-16 09:27:51', '2023-03-16 09:27:51', NULL),
	(35, '2023-03-19 21:03:00', 'kkkk', NULL, NULL, NULL, 'ok', 32, '2023-03-19 21:04:03', '2023-03-19 21:04:03', NULL),
	(36, '2023-03-20 12:13:00', 'ok', NULL, NULL, NULL, 'ok', 33, '2023-03-20 12:13:44', '2023-03-20 12:13:44', NULL),
	(37, '2023-03-20 13:34:00', 'qq', '2023-03-20 13:34:00', 'ss', '12', 'bien', 34, '2023-03-20 13:35:06', '2023-03-20 13:35:06', NULL),
	(38, '2023-03-27 01:02:00', 'BBB', NULL, NULL, 'BB', 'BB', 35, '2023-03-27 01:02:51', '2023-03-27 01:02:51', NULL),
	(39, '2023-03-27 01:15:00', 'nn', NULL, NULL, NULL, 'nnn', 37, '2023-03-27 01:15:57', '2023-03-27 01:15:57', NULL),
	(40, '2023-03-27 13:07:00', 'nnn', '2023-03-27 13:07:00', 'hhh', 'hh', 'kk', 38, '2023-03-27 13:07:42', '2023-03-27 13:07:42', NULL),
	(41, '2023-03-27 17:23:00', 'nn', NULL, NULL, NULL, 'nn', 45, '2023-03-27 17:23:49', '2023-03-27 17:23:49', NULL),
	(42, '2023-03-27 17:29:00', 'nn', NULL, NULL, NULL, 'nn', 46, '2023-03-27 17:29:19', '2023-03-27 17:29:19', NULL),
	(43, '2023-03-27 17:32:00', 'nnn', NULL, NULL, NULL, 'nnn', 47, '2023-03-27 17:33:10', '2023-03-27 17:33:10', NULL),
	(44, '2023-03-27 17:36:00', 'nnn', NULL, NULL, NULL, ',,n', 48, '2023-03-27 17:36:43', '2023-03-27 17:36:43', NULL),
	(45, '2023-03-27 17:41:00', 'bb', NULL, NULL, NULL, 'bb', 49, '2023-03-27 17:41:42', '2023-03-27 17:41:42', NULL),
	(46, '2023-03-27 17:41:00', 'bb', NULL, NULL, NULL, 'bb', 49, '2023-03-27 17:44:38', '2023-03-27 17:44:38', NULL),
	(47, '2023-03-27 17:48:00', 'nnn', NULL, NULL, NULL, 'nn', 50, '2023-03-27 17:49:30', '2023-03-27 17:49:30', NULL),
	(48, '2023-03-27 17:58:00', 'nnn', NULL, NULL, NULL, 'nnn', 52, '2023-03-27 17:58:35', '2023-03-27 17:58:35', NULL),
	(49, '2023-03-27 21:34:00', 'ok', NULL, NULL, NULL, 'ok', 51, '2023-03-27 21:34:54', '2023-03-27 21:34:54', NULL),
	(50, '2023-03-27 21:36:00', 'ok', NULL, NULL, NULL, 'ok', 54, '2023-03-27 21:37:11', '2023-03-27 21:37:11', NULL),
	(51, '2023-03-27 23:54:56', 'ok', NULL, NULL, NULL, 'ok', 28, NULL, NULL, NULL),
	(52, '2023-03-27 23:56:30', 'ok', NULL, NULL, NULL, 'ok', 58, NULL, NULL, NULL),
	(225, '2023-03-28 00:13:30', 'pl', NULL, NULL, NULL, 'pp', 59, NULL, NULL, NULL),
	(226, '2023-03-28 09:54:01', 'OO', NULL, NULL, NULL, 'LL', 14, NULL, NULL, NULL),
	(227, '2023-03-28 11:13:00', 'ok', NULL, NULL, NULL, 'ok', 61, '2023-03-28 11:13:29', '2023-03-28 11:13:29', NULL);

-- Listage de la structure de table gestionstock. articles
DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qteStock` double(8,2) NOT NULL,
  `Stockmin` double(8,2) NOT NULL,
  `pu` double(8,2) NOT NULL,
  `dateInscription` datetime NOT NULL,
  `observation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stockMax` float DEFAULT NULL,
  `securite` float DEFAULT NULL,
  `alert` float DEFAULT NULL,
  `categorie_id` bigint unsigned NOT NULL,
  `emplacement_id` bigint unsigned NOT NULL,
  `unite_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reference` (`reference`),
  KEY `articles_categorie_id_foreign` (`categorie_id`),
  KEY `articles_emplacement_id_foreign` (`emplacement_id`),
  KEY `articles_unite_id_foreign` (`unite_id`),
  CONSTRAINT `articles_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `articles_emplacement_id_foreign` FOREIGN KEY (`emplacement_id`) REFERENCES `emplacements` (`id`),
  CONSTRAINT `articles_unite_id_foreign` FOREIGN KEY (`unite_id`) REFERENCES `unites` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.articles : ~24 rows (environ)
INSERT INTO `articles` (`id`, `designation`, `qteStock`, `Stockmin`, `pu`, `dateInscription`, `observation`, `reference`, `stockMax`, `securite`, `alert`, `categorie_id`, `emplacement_id`, `unite_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'pcHP', 100.00, 4.00, 2000.00, '2023-03-06 09:43:15', 'rien et rien', 'ref1010', NULL, NULL, NULL, 1, 1, 4, NULL, '2023-03-13 15:07:00', NULL),
	(2, 'sourie', 40.00, 5.00, 70.00, '2023-03-06 09:45:37', 'on va voir', 'REF1002', NULL, NULL, NULL, 1, 1, 4, NULL, '2023-03-09 18:52:02', '2023-03-09 18:52:02'),
	(3, 'ecran', 10.00, 10.00, 20.00, '2023-03-06 00:00:00', NULL, 'ref1004', NULL, NULL, NULL, 1, 1, 4, '2023-03-06 10:17:54', '2023-03-07 11:12:50', '2023-03-07 11:12:50'),
	(4, 'cable', 33.00, 10.00, 20.00, '2023-03-15 00:00:00', NULL, 'ref1005', NULL, NULL, NULL, 1, 1, 1, '2023-03-06 10:19:27', '2023-03-06 10:19:27', '2023-03-08 10:57:26'),
	(5, 'sucre', 10.00, 10.00, 10.00, '2023-03-06 21:52:33', 'OP', 'ref1006', NULL, NULL, NULL, 2, 2, 1, NULL, '2023-03-07 11:11:31', '2023-03-07 11:11:31'),
	(6, 'javel', 22.00, 3.00, 15.00, '2023-03-06 00:00:00', 'aucun observation', 'ref1007', NULL, NULL, NULL, 2, 2, 1, '2023-03-06 19:56:02', '2023-03-08 08:12:30', '2023-03-08 08:12:30'),
	(7, 'hegiene', 2.00, 3.00, 15.00, '2023-03-01 00:00:00', NULL, 'ref1008', NULL, NULL, NULL, 2, 13, 4, '2023-03-06 20:44:45', '2023-03-27 20:34:00', NULL),
	(8, 'xx', 10.00, 3.00, 15.00, '2023-03-02 00:00:00', NULL, 'ref1003', NULL, NULL, NULL, 2, 2, 1, '2023-03-06 20:46:38', '2023-03-07 10:37:25', '2023-03-07 10:37:25'),
	(9, 'clavier', 22.00, 5.00, 400.00, '2023-03-06 00:00:00', NULL, 'clavier124', NULL, NULL, NULL, 1, 13, 4, '2023-03-06 20:57:30', '2023-03-27 20:32:25', NULL),
	(10, 'sourie', 10.00, 10.00, 1.00, '2023-03-24 15:30:00', 'op', 'ref1012', NULL, NULL, NULL, 1, 1, 1, '2023-03-09 13:32:25', '2023-03-13 13:58:52', NULL),
	(11, 'designation', 9.00, 10.00, 200.00, '2023-03-09 20:56:00', 'ok', 'ref1000', NULL, NULL, NULL, 4, 3, 1, '2023-03-09 18:56:28', '2023-03-09 18:56:28', NULL),
	(12, 'nn', 9.00, 2.00, 70.00, '2023-03-09 21:05:00', NULL, 'nn', NULL, NULL, NULL, 1, 1, 1, '2023-03-09 19:05:42', '2023-03-27 20:36:04', '2023-03-27 20:36:04'),
	(13, 'BB', 29.00, 2.00, 12.80, '2023-03-25 21:06:00', NULL, 'BB', NULL, NULL, NULL, 1, 1, 1, '2023-03-09 19:07:00', '2023-03-27 13:41:32', '2023-03-27 13:41:32'),
	(14, 'cable', 12.00, 4556.00, 10.00, '2023-03-20 13:50:00', NULL, 'ref100733', NULL, NULL, NULL, 1, 3, 2, '2023-03-20 13:50:55', '2023-03-20 13:51:07', NULL),
	(15, 'HH', 12.00, 4556.00, 20.00, '2023-03-20 13:52:00', NULL, 'BB234', NULL, NULL, NULL, 3, 5, 1, '2023-03-20 13:52:49', '2023-03-20 13:53:37', '2023-03-20 13:53:37'),
	(16, 'FAUteuil président en tissu', -1.00, 10.00, 2400.00, '2021-12-21 11:46:00', NULL, '2818/21/MMB', NULL, NULL, NULL, 2, 6, 1, '2023-03-22 11:50:50', '2023-03-22 11:50:50', NULL),
	(17, 'cableBB', 1.00, 10.00, 20.00, '2023-03-27 00:59:00', 'OB', 'ref1007333333', NULL, NULL, NULL, 1, 1, 1, '2023-03-27 01:00:03', '2023-03-27 01:00:03', NULL),
	(18, 'ffff', 13.00, 10.00, 10.00, '2023-03-27 10:07:00', 'vvvvvvvvv', 'ref1004bbbbbb', NULL, NULL, NULL, 1, 1, 1, '2023-03-27 10:07:28', '2023-03-27 20:37:17', '2023-03-27 20:37:17'),
	(19, 'bbbbb', 124.00, 2.00, 10.00, '2023-03-27 12:18:00', NULL, 'ref1007gggg', 122, 2, 10, 1, 1, 1, '2023-03-27 12:18:42', '2023-03-27 12:18:42', NULL),
	(20, 'sourie', 12.00, 4556.00, 10.00, '2023-03-27 13:03:00', 'rien', 'nouh', 122, 2, 10, 3, 4, 1, '2023-03-27 13:03:49', '2023-03-27 13:03:49', NULL),
	(43, 'sourie', 40.00, 80.00, 20.00, '2023-03-27 13:42:00', 'love you', 'gggggggggggggggggggggg', 122, 2, 10, 6, 6, 1, '2023-03-27 13:45:13', '2023-03-27 20:35:20', '2023-03-27 20:35:20'),
	(57, 'sofre', 10.00, 3.00, 15.00, '2023-03-27 18:26:00', '', 'ref1002éééé', NULL, NULL, NULL, 1, 13, 4, '2023-03-27 18:27:37', '2023-03-27 18:27:37', NULL),
	(58, 'qlq', 10.00, 3.00, 400.00, '2023-03-27 20:30:00', NULL, 'kkkk', 12, 23, 2, 1, 13, 4, '2023-03-27 20:31:20', '2023-03-27 20:31:20', NULL),
	(61, 'ET', 34.00, 7.00, 12.00, '2023-03-28 10:30:27', NULL, 'ok', NULL, NULL, NULL, 2, 13, 4, NULL, '2023-03-28 11:17:13', NULL);

-- Listage de la structure de table gestionstock. bon_cmds
DROP TABLE IF EXISTS `bon_cmds`;
CREATE TABLE IF NOT EXISTS `bon_cmds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dateCmd` timestamp NOT NULL,
  `numBonCmd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fournisseur_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bon_cmds_fournisseur_id_foreign` (`fournisseur_id`),
  CONSTRAINT `bon_cmds_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.bon_cmds : ~75 rows (environ)
INSERT INTO `bon_cmds` (`id`, `dateCmd`, `numBonCmd`, `created_at`, `updated_at`, `fournisseur_id`) VALUES
	(5, '2023-03-14 20:49:15', 'nnnn', NULL, NULL, 1),
	(6, '2023-03-14 21:53:00', 'bonCmd124', '2023-03-14 20:53:10', '2023-03-14 20:53:10', 1),
	(7, '2023-03-22 11:54:00', '7778/21', '2023-03-22 11:55:04', '2023-03-22 11:55:04', 5),
	(8, '2023-03-27 00:04:00', 'bonCmd123', '2023-03-27 00:07:03', '2023-03-27 00:07:03', 1),
	(9, '2023-03-27 00:20:00', 'bonCmd123', '2023-03-27 00:20:50', '2023-03-27 00:20:50', 1),
	(10, '2023-03-15 23:21:00', 'marche123', '2023-03-27 00:21:56', '2023-03-27 00:21:56', 1),
	(11, '2023-03-27 00:23:00', 'bonCmd123', '2023-03-27 00:23:37', '2023-03-27 00:23:37', 1),
	(12, '2023-03-30 00:24:00', 'marche123', '2023-03-27 00:24:42', '2023-03-27 00:24:42', 1),
	(13, '2023-03-27 00:26:00', 'bonCmd123', '2023-03-27 00:26:57', '2023-03-27 00:26:57', 1),
	(14, '2023-03-27 00:26:00', 'bonCmd123', '2023-03-27 00:27:11', '2023-03-27 00:27:11', 1),
	(15, '2023-03-27 00:26:00', 'bonCmd123', '2023-03-27 00:27:49', '2023-03-27 00:27:49', 1),
	(16, '2023-03-27 00:26:00', 'bonCmd123', '2023-03-27 00:28:30', '2023-03-27 00:28:30', 1),
	(17, '2023-03-27 00:30:00', 'marche123', '2023-03-27 00:30:38', '2023-03-27 00:30:38', 1),
	(18, '2023-03-23 00:34:00', 'bonCmd123', '2023-03-27 00:34:15', '2023-03-27 00:34:15', 1),
	(19, '2023-04-07 00:34:00', 'bonCmd124', '2023-03-27 00:37:16', '2023-03-27 00:37:16', 1),
	(20, '2023-04-07 00:34:00', 'bonCmd124', '2023-03-27 00:38:51', '2023-03-27 00:38:51', 1),
	(21, '2023-03-27 00:40:00', 'bonCmd123', '2023-03-27 00:40:57', '2023-03-27 00:40:57', 1),
	(22, '2023-03-27 00:40:00', 'bonCmd123', '2023-03-27 00:41:37', '2023-03-27 00:41:37', 1),
	(23, '2023-03-27 00:43:00', 'marche123', '2023-03-27 00:43:43', '2023-03-27 00:43:43', 1),
	(24, '2023-03-27 00:43:00', 'marche123', '2023-03-27 00:44:10', '2023-03-27 00:44:10', 1),
	(25, '2023-03-27 00:43:00', 'marche123', '2023-03-27 00:45:26', '2023-03-27 00:45:26', 1),
	(26, '2023-03-27 00:43:00', 'marche123', '2023-03-27 00:46:05', '2023-03-27 00:46:05', 1),
	(27, '2023-03-27 00:43:00', 'marche123', '2023-03-27 00:47:20', '2023-03-27 00:47:20', 1),
	(28, '2023-03-27 00:49:00', 'marche123', '2023-03-27 00:49:20', '2023-03-27 00:49:20', 1),
	(29, '2023-03-27 00:49:00', 'marche123', '2023-03-27 00:53:21', '2023-03-27 00:53:21', 1),
	(30, '2023-03-27 00:49:00', 'marche123', '2023-03-27 00:53:30', '2023-03-27 00:53:30', 1),
	(31, '2023-03-27 00:49:00', 'marche123', '2023-03-27 00:53:42', '2023-03-27 00:53:42', 1),
	(32, '2023-03-23 00:59:00', 'bonCmd123', '2023-03-27 01:00:03', '2023-03-27 01:00:03', 1),
	(33, '2023-03-27 10:00:00', 'bonCmd123', '2023-03-27 10:01:08', '2023-03-27 10:01:08', 1),
	(34, '2023-03-27 10:07:00', 'bonCmd123', '2023-03-27 10:07:28', '2023-03-27 10:07:28', 1),
	(35, '2023-03-27 10:09:00', 'marche123', '2023-03-27 10:09:38', '2023-03-27 10:09:38', 1),
	(36, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:21', '2023-03-27 13:10:21', 4),
	(37, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:23', '2023-03-27 13:10:23', 4),
	(38, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:24', '2023-03-27 13:10:24', 4),
	(39, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:24', '2023-03-27 13:10:24', 4),
	(40, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:25', '2023-03-27 13:10:25', 4),
	(41, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:26', '2023-03-27 13:10:26', 4),
	(42, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:26', '2023-03-27 13:10:26', 4),
	(43, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:28', '2023-03-27 13:10:28', 4),
	(44, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:28', '2023-03-27 13:10:28', 4),
	(45, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:29', '2023-03-27 13:10:29', 4),
	(46, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:30', '2023-03-27 13:10:30', 4),
	(47, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:30', '2023-03-27 13:10:30', 4),
	(48, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:31', '2023-03-27 13:10:31', 4),
	(49, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:31', '2023-03-27 13:10:31', 4),
	(50, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:32', '2023-03-27 13:10:32', 4),
	(51, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:33', '2023-03-27 13:10:33', 4),
	(52, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:34', '2023-03-27 13:10:34', 4),
	(53, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:34', '2023-03-27 13:10:34', 4),
	(54, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:35', '2023-03-27 13:10:35', 4),
	(55, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:36', '2023-03-27 13:10:36', 4),
	(56, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:36', '2023-03-27 13:10:36', 4),
	(57, '2023-03-27 13:09:00', 'bonCmd123', '2023-03-27 13:10:37', '2023-03-27 13:10:37', 4),
	(58, '2023-03-27 13:49:00', 'bonCmd123', '2023-03-27 13:51:27', '2023-03-27 13:51:27', 1),
	(59, '2023-03-27 13:49:00', 'bonCmd123', '2023-03-27 13:51:31', '2023-03-27 13:51:31', 1),
	(60, '2023-03-27 13:49:00', 'bonCmd123', '2023-03-27 13:51:34', '2023-03-27 13:51:34', 1),
	(61, '2023-03-27 13:49:00', 'bonCmd123', '2023-03-27 13:51:35', '2023-03-27 13:51:35', 1),
	(62, '2023-03-27 13:49:00', 'bonCmd123', '2023-03-27 13:51:35', '2023-03-27 13:51:35', 1),
	(63, '2023-03-27 13:49:00', 'bonCmd123', '2023-03-27 13:51:36', '2023-03-27 13:51:36', 1),
	(64, '2023-03-27 13:49:00', 'bonCmd123', '2023-03-27 13:51:36', '2023-03-27 13:51:36', 1),
	(65, '2023-03-27 13:49:00', 'bonCmd123', '2023-03-27 13:51:36', '2023-03-27 13:51:36', 1),
	(66, '2023-03-27 13:49:00', 'bonCmd123', '2023-03-27 13:51:37', '2023-03-27 13:51:37', 1),
	(67, '2023-03-27 13:49:00', 'bonCmd123', '2023-03-27 13:51:37', '2023-03-27 13:51:37', 1),
	(68, '2023-03-27 13:49:00', 'bonCmd123', '2023-03-27 13:51:37', '2023-03-27 13:51:37', 1),
	(69, '2023-03-27 13:49:00', 'bonCmd123', '2023-03-27 13:51:38', '2023-03-27 13:51:38', 1),
	(70, '2023-03-27 13:49:00', 'bonCmd123', '2023-03-27 13:51:39', '2023-03-27 13:51:39', 1),
	(71, '2023-03-27 18:26:00', 'ok', '2023-03-27 18:27:37', '2023-03-27 18:27:37', 1),
	(72, '2023-03-27 19:43:00', 'ok', '2023-03-27 19:43:57', '2023-03-27 19:43:57', 1),
	(73, '2023-03-27 19:45:00', 'ok', '2023-03-27 19:45:16', '2023-03-27 19:45:16', 1),
	(74, '2023-03-27 19:45:00', '', '2023-03-27 19:45:52', '2023-03-27 19:45:52', 1),
	(75, '2023-03-27 19:46:00', '', '2023-03-27 19:46:35', '2023-03-27 19:46:35', 1),
	(76, '2023-03-27 19:50:00', 'pk', '2023-03-27 19:51:00', '2023-03-27 19:51:00', 1),
	(77, '2023-03-27 19:54:00', 'ok', '2023-03-27 19:54:42', '2023-03-27 19:54:42', 1),
	(78, '2023-03-27 20:00:00', 'p', '2023-03-27 20:00:54', '2023-03-27 20:00:54', 1),
	(79, '2023-03-27 20:00:00', 'p', '2023-03-27 20:05:15', '2023-03-27 20:05:15', 1),
	(80, '2023-03-27 20:00:00', 'p', '2023-03-27 20:07:29', '2023-03-27 20:07:29', 1),
	(81, '2023-03-27 20:00:00', 'p', '2023-03-27 20:11:09', '2023-03-27 20:11:09', 1),
	(82, '2023-03-27 20:00:00', 'p', '2023-03-27 20:13:22', '2023-03-27 20:13:22', 1);

-- Listage de la structure de table gestionstock. categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.categories : ~8 rows (environ)
INSERT INTO `categories` (`id`, `categorie`, `created_at`, `updated_at`) VALUES
	(1, 'informatique', NULL, NULL),
	(2, 'immobilier', NULL, NULL),
	(3, 'produit de la santé', '2023-03-07 19:59:04', '2023-03-07 19:59:04'),
	(4, 'autre', '2023-03-09 18:50:06', '2023-03-09 18:50:06'),
	(5, 'nouhayla', '2023-03-27 13:01:55', '2023-03-27 13:01:55'),
	(6, 'ali', '2023-03-27 13:39:47', '2023-03-27 13:39:47'),
	(7, 'vv', '2023-03-27 16:33:45', '2023-03-27 16:33:45'),
	(8, 'nnn', '2023-03-27 20:39:57', '2023-03-27 20:39:57'),
	(9, 'oplk', '2023-03-27 21:00:07', '2023-03-27 21:00:07');

-- Listage de la structure de table gestionstock. demandes
DROP TABLE IF EXISTS `demandes`;
CREATE TABLE IF NOT EXISTS `demandes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dateDemande` datetime NOT NULL,
  `qteArticle` double(8,2) NOT NULL,
  `article_id` bigint unsigned NOT NULL,
  `unite_id` bigint unsigned NOT NULL,
  `salle_id` bigint unsigned DEFAULT NULL,
  `personne_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `demandes_article_id_foreign` (`article_id`),
  KEY `demandes_user_id_foreign` (`user_id`),
  KEY `demandes_personne_id_foreign` (`personne_id`),
  KEY `demandes_salle_id_foreign` (`salle_id`),
  KEY `demandes_unite_id_foreign` (`unite_id`),
  CONSTRAINT `demandes_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  CONSTRAINT `demandes_personne_id_foreign` FOREIGN KEY (`personne_id`) REFERENCES `personnes` (`id`),
  CONSTRAINT `demandes_salle_id_foreign` FOREIGN KEY (`salle_id`) REFERENCES `salles` (`id`),
  CONSTRAINT `demandes_unite_id_foreign` FOREIGN KEY (`unite_id`) REFERENCES `unites` (`id`),
  CONSTRAINT `demandes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.demandes : ~38 rows (environ)
INSERT INTO `demandes` (`id`, `dateDemande`, `qteArticle`, `article_id`, `unite_id`, `salle_id`, `personne_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(13, '2023-03-09 12:42:00', 4.00, 1, 4, 3, NULL, 1, '2023-03-09 10:42:31', '2023-03-09 10:43:57', '2023-03-09 10:43:57'),
	(14, '2023-03-09 12:54:00', 2.00, 1, 4, 3, NULL, 1, '2023-03-09 10:54:42', '2023-03-09 10:54:42', '2023-03-28 09:54:14'),
	(15, '2023-03-09 14:51:00', 1.00, 2, 4, 3, NULL, 1, '2023-03-09 12:51:34', '2023-03-09 12:51:34', '2023-03-09 13:52:22'),
	(16, '2023-03-09 14:54:00', 1.00, 2, 4, 3, NULL, 1, '2023-03-09 12:54:10', '2023-03-09 12:54:10', '2023-03-09 13:57:28'),
	(17, '2023-03-09 15:08:00', 1.00, 7, 1, 3, NULL, 1, '2023-03-09 13:09:42', '2023-03-09 13:09:42', '2023-03-09 14:10:47'),
	(18, '2023-03-09 15:37:00', 1.00, 2, 4, 3, NULL, 1, '2023-03-09 13:38:20', '2023-03-09 13:38:20', '2023-03-09 18:12:10'),
	(19, '2023-03-09 19:23:00', 1.00, 1, 4, 3, NULL, 2, '2023-03-09 17:23:59', '2023-03-09 17:23:59', '2023-03-09 18:24:42'),
	(20, '2023-03-09 20:56:00', 2.00, 1, 4, 3, NULL, 2, '2023-03-09 18:57:00', '2023-03-09 18:57:00', '2023-03-14 08:46:52'),
	(22, '2023-03-13 21:22:00', 2.00, 1, 4, 4, NULL, 1, '2023-03-13 19:24:55', '2023-03-13 19:24:55', '2023-03-14 08:50:59'),
	(23, '2023-03-13 21:26:00', 1.00, 1, 4, 4, NULL, 1, '2023-03-13 19:26:41', '2023-03-13 19:26:41', '2023-03-14 08:58:49'),
	(24, '2023-03-13 21:31:00', 1.00, 1, 4, 4, NULL, 1, '2023-03-13 19:32:04', '2023-03-13 19:32:04', '2023-03-14 09:46:26'),
	(25, '2023-03-13 21:35:00', 1.00, 7, 1, 4, NULL, 1, '2023-03-13 19:35:20', '2023-03-13 19:35:20', '2023-03-14 09:59:41'),
	(26, '2023-03-13 21:40:00', 1.00, 9, 4, 4, NULL, 1, '2023-03-13 19:40:25', '2023-03-13 19:40:25', '2023-03-14 12:21:08'),
	(27, '2023-03-13 21:41:00', 1.00, 12, 1, 4, NULL, 1, '2023-03-13 19:41:24', '2023-03-13 19:41:24', '2023-03-14 12:22:45'),
	(28, '2023-03-13 21:41:00', 1.00, 12, 1, NULL, 3, 1, '2023-03-13 19:41:46', '2023-03-13 19:41:46', '2023-03-27 23:55:17'),
	(29, '2023-03-13 22:18:00', 1.00, 7, 1, 4, NULL, 1, '2023-03-13 20:18:25', '2023-03-13 20:18:25', '2023-03-14 08:53:34'),
	(30, '2023-03-13 22:26:00', 1.00, 1, 4, NULL, 3, 1, '2023-03-13 20:27:06', '2023-03-13 20:27:06', '2023-03-14 08:56:18'),
	(31, '2023-03-14 13:28:00', 2.00, 1, 4, 4, NULL, 1, '2023-03-14 11:28:15', '2023-03-14 11:28:15', '2023-03-16 10:27:51'),
	(32, '2023-03-14 17:13:00', 1.00, 7, 1, 4, NULL, 1, '2023-03-14 15:13:22', '2023-03-14 15:13:22', '2023-03-19 21:04:03'),
	(33, '2023-03-19 21:12:00', 10.00, 1, 4, 4, NULL, 2, '2023-03-19 21:12:20', '2023-03-19 21:12:20', '2023-03-20 12:13:44'),
	(34, '2023-03-20 13:34:00', 10.00, 7, 1, 4, 3, 8, '2023-03-20 13:34:14', '2023-03-20 13:34:30', '2023-03-20 13:35:06'),
	(35, '2023-03-20 13:39:00', 1.00, 12, 1, 4, NULL, 8, '2023-03-20 13:39:38', '2023-03-20 13:39:38', '2023-03-27 01:02:51'),
	(36, '2023-03-20 14:01:00', 10.00, 12, 1, 4, NULL, 6, '2023-03-20 14:01:25', '2023-03-21 09:43:56', '2023-03-21 09:43:56'),
	(37, '2023-03-25 10:02:00', 1.00, 9, 4, 4, NULL, 1, '2023-03-25 10:02:28', '2023-03-25 10:02:28', '2023-03-27 01:15:58'),
	(38, '2023-03-27 13:06:00', 1.00, 9, 4, 4, NULL, 1, '2023-03-27 13:06:15', '2023-03-27 13:06:15', '2023-03-27 13:07:42'),
	(39, '2023-03-27 13:37:00', 8.00, 20, 1, 4, NULL, 9, '2023-03-27 13:37:52', '2023-03-27 13:38:07', '2023-03-27 13:38:07'),
	(40, '2023-03-27 13:45:00', 10.00, 43, 1, 4, NULL, 1, '2023-03-27 13:46:01', '2023-03-27 13:46:17', '2023-03-27 13:46:17'),
	(41, '2023-03-27 14:24:00', 10.00, 43, 1, 4, NULL, 9, '2023-03-27 14:24:18', '2023-03-27 14:24:26', '2023-03-27 14:24:26'),
	(44, '2023-03-27 16:44:00', 12.00, 1, 4, 8, NULL, 15, '2023-03-27 16:45:35', '2023-03-27 16:46:08', '2023-03-27 16:46:08'),
	(45, '2023-03-27 16:46:00', 2.00, 16, 1, 8, NULL, 15, '2023-03-27 16:47:01', '2023-03-27 16:47:01', '2023-03-27 17:23:49'),
	(46, '2023-03-27 17:28:00', 10.00, 1, 4, 9, NULL, 15, '2023-03-27 17:28:53', '2023-03-27 17:28:53', '2023-03-27 17:29:19'),
	(47, '2023-03-27 17:32:00', 10.00, 7, 1, 9, NULL, 15, '2023-03-27 17:32:48', '2023-03-27 17:32:48', '2023-03-27 17:33:10'),
	(48, '2023-03-27 17:35:00', 10.00, 1, 4, 9, NULL, 21, '2023-03-27 17:35:53', '2023-03-27 17:35:53', '2023-03-27 17:36:43'),
	(49, '2023-03-27 17:41:00', 10.00, 9, 4, 9, NULL, 15, '2023-03-27 17:41:22', '2023-03-27 17:41:22', '2023-03-27 17:44:38'),
	(50, '2023-03-27 17:48:00', 10.00, 9, 4, 9, NULL, 15, '2023-03-27 17:48:11', '2023-03-27 17:48:11', '2023-03-27 17:49:30'),
	(51, '2023-03-27 17:55:00', 1.00, 7, 1, 9, NULL, 15, '2023-03-27 17:55:38', '2023-03-27 21:04:42', '2023-03-27 21:34:54'),
	(52, '2023-03-27 17:56:00', 1.00, 11, 1, 9, NULL, 15, '2023-03-27 17:56:30', '2023-03-27 17:56:30', '2023-03-27 17:58:35'),
	(53, '2023-03-27 21:06:00', 9.00, 1, 4, 9, NULL, 21, '2023-03-27 21:06:28', '2023-03-27 21:06:28', NULL),
	(54, '2023-03-27 21:36:00', 2.00, 7, 4, 9, NULL, 21, '2023-03-27 21:36:35', '2023-03-27 21:36:35', '2023-03-27 21:37:11'),
	(55, '2023-03-27 21:59:00', 10.00, 1, 4, 9, NULL, 21, '2023-03-27 21:59:41', '2023-03-27 21:59:41', NULL),
	(56, '2023-03-27 22:00:00', 1.00, 1, 4, 9, NULL, 15, '2023-03-27 22:00:36', '2023-03-27 22:00:36', NULL),
	(57, '2023-03-27 22:02:00', 9.00, 9, 4, 9, NULL, 21, '2023-03-27 22:02:39', '2023-03-27 22:02:39', NULL),
	(58, '2023-03-27 23:55:43', 2.00, 1, 1, 7, NULL, 11, NULL, NULL, '2023-03-27 23:56:47'),
	(59, '2023-03-28 00:04:54', 2.00, 2, 1, 4, NULL, 17, NULL, NULL, '2023-03-28 00:13:43'),
	(60, '2023-03-28 09:20:00', 10.00, 16, 1, 9, NULL, 22, '2023-03-28 09:20:42', '2023-03-28 09:20:42', NULL),
	(61, '2023-03-28 11:12:00', 10.00, 61, 1, 9, NULL, 21, '2023-03-28 11:12:58', '2023-03-28 11:12:58', '2023-03-28 11:13:29');

-- Listage de la structure de table gestionstock. emplacements
DROP TABLE IF EXISTS `emplacements`;
CREATE TABLE IF NOT EXISTS `emplacements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `emplacement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.emplacements : ~11 rows (environ)
INSERT INTO `emplacements` (`id`, `emplacement`, `rang`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'depots101', NULL, NULL, '2023-03-27 14:07:00', '2023-03-27 14:07:00'),
	(2, 'depots102', NULL, NULL, '2023-03-27 14:07:02', '2023-03-27 14:07:02'),
	(3, 'depots13', NULL, '2023-03-09 07:39:00', '2023-03-27 14:07:11', '2023-03-27 14:07:11'),
	(4, 'depots103', NULL, '2023-03-09 19:56:59', '2023-03-27 14:08:05', '2023-03-27 14:08:05'),
	(5, 'bbm', NULL, '2023-03-20 13:47:33', '2023-03-27 14:08:07', '2023-03-27 14:08:07'),
	(6, 'bureau dericteur', NULL, '2023-03-22 11:44:36', '2023-03-27 14:08:09', '2023-03-27 14:08:09'),
	(7, 'kknnn', NULL, '2023-03-27 13:58:11', '2023-03-27 14:16:22', '2023-03-27 14:16:22'),
	(8, 'depots103', NULL, '2023-03-27 14:16:31', '2023-03-27 14:20:47', '2023-03-27 14:20:47'),
	(9, 'bb', NULL, '2023-03-27 14:16:36', '2023-03-27 14:21:20', '2023-03-27 14:21:20'),
	(10, 'depots103', NULL, '2023-03-27 14:21:58', '2023-03-27 14:22:10', '2023-03-27 14:22:10'),
	(11, 'depots13', NULL, '2023-03-27 14:22:04', '2023-03-27 14:30:22', '2023-03-27 14:30:22'),
	(12, 'depots13n', NULL, '2023-03-27 16:48:35', '2023-03-27 16:48:52', '2023-03-27 16:48:52'),
	(13, 'depots103', NULL, '2023-03-27 16:49:20', '2023-03-27 16:49:20', NULL);

-- Listage de la structure de table gestionstock. factures
DROP TABLE IF EXISTS `factures`;
CREATE TABLE IF NOT EXISTS `factures` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qte` double(8,2) NOT NULL,
  `prixT` double(8,2) DEFAULT NULL,
  `tva` double(8,2) NOT NULL,
  `prixTTC` double(8,2) DEFAULT NULL,
  `article_id` bigint unsigned NOT NULL,
  `bonCmd_id` bigint unsigned DEFAULT NULL,
  `marche_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `factures_article_id_foreign` (`article_id`),
  KEY `FK_factures_marches` (`marche_id`),
  KEY `FK_factures_bon_cmds` (`bonCmd_id`),
  CONSTRAINT `factures_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  CONSTRAINT `FK_factures_bon_cmds` FOREIGN KEY (`bonCmd_id`) REFERENCES `bon_cmds` (`id`),
  CONSTRAINT `FK_factures_marches` FOREIGN KEY (`marche_id`) REFERENCES `marches` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.factures : ~61 rows (environ)
INSERT INTO `factures` (`id`, `signature`, `qte`, `prixT`, `tva`, `prixTTC`, `article_id`, `bonCmd_id`, `marche_id`, `created_at`, `updated_at`) VALUES
	(8, 'bb', 10.00, 100.00, 5.00, 12345.00, 13, 5, NULL, NULL, NULL),
	(9, 'GG', 5.00, 33.00, 4.00, 123.00, 9, NULL, 3, NULL, NULL),
	(16, 'KHALDI', 1.00, 123.00, 20.00, 123444.00, 1, 5, NULL, '2023-03-21 10:20:53', '2023-03-21 10:20:53'),
	(17, 'KHALDI', 1.00, 123.00, 20.00, 1234.00, 1, NULL, 3, '2023-03-21 10:21:27', '2023-03-21 10:21:27'),
	(18, 'KHALDI', 10.00, 123.00, 20.00, 1234.00, 7, 5, NULL, '2023-03-21 11:14:43', '2023-03-21 11:14:43'),
	(19, 'BBB', 1.00, 2400.00, 0.00, 2400.00, 16, 7, NULL, '2023-03-22 11:55:57', '2023-03-22 11:55:57'),
	(20, '', 1.00, 1.00, 0.00, 1.00, 10, NULL, NULL, '2023-03-27 00:31:23', '2023-03-27 00:31:23'),
	(22, 'KHALDI', 1.00, 123.00, 0.00, 123444.00, 1, 30, NULL, '2023-03-27 00:53:31', '2023-03-27 00:53:31'),
	(23, 'KHALDI', 1.00, 123.00, 0.00, 123444.00, 1, 31, NULL, '2023-03-27 00:53:42', '2023-03-27 00:53:42'),
	(24, 'KHALDI', 1.00, 15.00, 0.00, 15.00, 1, 32, NULL, '2023-03-27 01:00:03', '2023-03-27 01:00:03'),
	(25, 'KHALDI', 1.00, 15.00, 0.00, 15.00, 7, 32, NULL, '2023-03-27 01:00:03', '2023-03-27 01:00:03'),
	(26, 'KHALDI', 1.00, 15.00, 0.00, 15.00, 17, 32, NULL, '2023-03-27 01:00:03', '2023-03-27 01:00:03'),
	(27, 'JJJJJJJJJJ', 1.00, 123.00, 1.00, 1234.00, 1, 33, NULL, '2023-03-27 10:01:08', '2023-03-27 10:01:08'),
	(28, 'KHALDI', 1.00, 123.00, 0.00, 123444.00, 18, 34, NULL, '2023-03-27 10:07:28', '2023-03-27 10:07:28'),
	(29, 'BBB', 1.00, 123.00, 0.00, 1234.00, 1, 35, NULL, '2023-03-27 10:09:38', '2023-03-27 10:09:38'),
	(30, 'KHALDI', 1.00, 123.00, 0.00, 1234.00, 1, NULL, 3, '2023-03-27 13:08:45', '2023-03-27 13:08:45'),
	(31, 'KHALDI', 1.00, 123.00, 5.00, 129.15, 1, 5, NULL, '2023-03-27 13:48:13', '2023-03-27 13:48:13'),
	(32, 'KHALDI', 1.00, 1.00, 5.00, 1.05, 10, NULL, 3, '2023-03-27 13:48:33', '2023-03-27 13:48:33'),
	(33, 'HH', 1.00, 123.00, 9.00, 134.07, 1, 9, NULL, '2023-03-27 13:48:56', '2023-03-27 13:48:56'),
	(34, 'HH', 10.00, 200.00, 6.00, 212.00, 18, 58, NULL, '2023-03-27 13:51:27', '2023-03-27 13:51:27'),
	(35, 'HH', 10.00, 200.00, 6.00, 212.00, 18, 59, NULL, '2023-03-27 13:51:31', '2023-03-27 13:51:31'),
	(36, 'HH', 10.00, 200.00, 6.00, 212.00, 18, 60, NULL, '2023-03-27 13:51:34', '2023-03-27 13:51:34'),
	(37, 'HH', 10.00, 200.00, 6.00, 212.00, 18, 61, NULL, '2023-03-27 13:51:35', '2023-03-27 13:51:35'),
	(38, 'HH', 10.00, 200.00, 6.00, 212.00, 18, 62, NULL, '2023-03-27 13:51:35', '2023-03-27 13:51:35'),
	(39, 'HH', 10.00, 200.00, 6.00, 212.00, 18, 63, NULL, '2023-03-27 13:51:36', '2023-03-27 13:51:36'),
	(40, 'HH', 10.00, 200.00, 6.00, 212.00, 18, 64, NULL, '2023-03-27 13:51:36', '2023-03-27 13:51:36'),
	(41, 'HH', 10.00, 200.00, 6.00, 212.00, 18, 65, NULL, '2023-03-27 13:51:36', '2023-03-27 13:51:36'),
	(42, 'HH', 10.00, 200.00, 6.00, 212.00, 18, 66, NULL, '2023-03-27 13:51:37', '2023-03-27 13:51:37'),
	(43, 'HH', 10.00, 200.00, 6.00, 212.00, 18, 67, NULL, '2023-03-27 13:51:37', '2023-03-27 13:51:37'),
	(44, 'HH', 10.00, 200.00, 6.00, 212.00, 18, 68, NULL, '2023-03-27 13:51:37', '2023-03-27 13:51:37'),
	(45, 'HH', 10.00, 200.00, 6.00, 212.00, 18, 69, NULL, '2023-03-27 13:51:38', '2023-03-27 13:51:38'),
	(46, 'HH', 10.00, 200.00, 6.00, 212.00, 18, 70, NULL, '2023-03-27 13:51:39', '2023-03-27 13:51:39'),
	(47, 'ok', 1.00, 400.00, 0.00, 400.00, 9, 71, NULL, '2023-03-27 18:27:37', '2023-03-27 18:27:37'),
	(48, 'ok', 10.00, 150.00, 0.00, 150.00, 57, 71, NULL, '2023-03-27 18:27:37', '2023-03-27 18:27:37'),
	(49, 'ok', 1.00, 15.00, 0.00, 15.00, 7, 76, NULL, '2023-03-27 19:51:00', '2023-03-27 19:51:00'),
	(50, 'p', 1.00, 15.00, 0.00, 15.00, 7, 77, NULL, '2023-03-27 19:54:42', '2023-03-27 19:54:42'),
	(51, 'ok', 1.00, 1.00, 0.00, 1.00, 10, 78, NULL, '2023-03-27 20:00:54', '2023-03-27 20:00:54'),
	(52, 'ok', 1.00, 1.00, 0.00, 1.00, 10, 79, NULL, '2023-03-27 20:05:15', '2023-03-27 20:05:15'),
	(53, 'ok', 10.00, 10.00, 8.00, 10.80, 10, 79, NULL, '2023-03-27 20:05:15', '2023-03-27 20:05:15'),
	(54, 'ok', 1.00, 1.00, 0.00, 1.00, 10, 80, NULL, '2023-03-27 20:07:29', '2023-03-27 20:07:29'),
	(55, 'ok', 10.00, 10.00, 8.00, 10.80, 10, 80, NULL, '2023-03-27 20:07:29', '2023-03-27 20:07:29'),
	(56, 'ok', 1.00, 1.00, 0.00, 1.00, 10, 81, NULL, '2023-03-27 20:11:09', '2023-03-27 20:11:09'),
	(57, 'ok', 10.00, 10.00, 8.00, 10.80, 10, 81, NULL, '2023-03-27 20:11:09', '2023-03-27 20:11:09'),
	(58, 'ok', 1.00, 1.00, 0.00, 1.00, 10, 82, NULL, '2023-03-27 20:13:22', '2023-03-27 20:13:22'),
	(59, 'ok', 10.00, 10.00, 8.00, 10.80, 10, 82, NULL, '2023-03-27 20:13:22', '2023-03-27 20:13:22'),
	(60, 'OK', 1.00, 122.00, 0.00, 122.00, 1, 5, NULL, '2023-03-27 20:16:14', '2023-03-27 20:16:14'),
	(61, 'ok', 1.00, 400.00, 0.00, 400.00, 9, 5, NULL, '2023-03-27 20:19:03', '2023-03-27 20:19:03'),
	(62, 'ok', 1.00, 1.00, 0.00, 1.00, 10, 5, NULL, '2023-03-27 20:21:03', '2023-03-27 20:21:03'),
	(63, 'ok', 1.00, 15.00, 0.00, 15.00, 7, 5, NULL, '2023-03-27 20:21:39', '2023-03-27 20:21:39'),
	(64, 'p', 1.00, 15.00, 0.00, 15.00, 7, 5, NULL, '2023-03-27 20:22:26', '2023-03-27 20:22:26'),
	(65, 'OK', 1.00, 15.00, 0.00, 15.00, 7, 5, NULL, '2023-03-27 20:26:39', '2023-03-27 20:26:39'),
	(66, 'ff', 10.00, 12.00, 0.00, 12.00, 1, 74, NULL, NULL, NULL),
	(67, 'GHHJ', 45.00, 55.00, 4.00, 123.00, 1, NULL, 4, NULL, NULL),
	(68, 'BB', 12.00, 11.00, 1.00, 11.00, 13, NULL, 4, NULL, NULL),
	(69, 'GH', 12.00, 23.00, 34.00, 12.00, 18, 13, NULL, NULL, NULL),
	(70, 'ok', 12.00, 45.00, 66.00, 56.00, 19, 74, NULL, NULL, NULL),
	(71, 'OK', 12.00, 34.00, 4.00, 45.00, 1, NULL, 4, NULL, NULL),
	(72, 'LL', 23.00, 45.00, 56.00, 56.00, 1, 74, NULL, NULL, NULL),
	(73, 'jj', 56.00, 67.00, 67.00, 67.00, 19, NULL, 5, NULL, NULL),
	(74, 'ok', 12.00, 44.00, 6.00, 56.00, 6, 7, NULL, NULL, NULL),
	(75, 'KK', 23.00, 45.00, 6.00, 67.00, 19, NULL, 4, NULL, NULL),
	(76, 'nn', 3.00, 55.00, 6.00, 66.00, 13, 66, NULL, NULL, NULL),
	(77, 'BB', 23.00, 45.00, 78.00, 67.00, 4, NULL, 5, NULL, NULL);

-- Listage de la structure de table gestionstock. failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.failed_jobs : ~0 rows (environ)

-- Listage de la structure de table gestionstock. fournisseurs
DROP TABLE IF EXISTS `fournisseurs`;
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fournisseurs_email_unique` (`email`),
  KEY `fournisseurs_categorie_id_foreign` (`categorie_id`),
  CONSTRAINT `fournisseurs_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.fournisseurs : ~7 rows (environ)
INSERT INTO `fournisseurs` (`id`, `nom`, `tel`, `adresse`, `email`, `categorie_id`, `created_at`, `updated_at`) VALUES
	(1, 'KHAlDI', '061911866', 'and', 'batoul1998aa@gmail.com', 1, NULL, '2023-03-27 21:03:52'),
	(2, 'khaldi', '0619118666', 'azervvnvn', 'khaldi@gmail.com', 1, '2023-03-08 21:35:24', '2023-03-08 21:35:24'),
	(3, 'mhamdi', '0619118666', 'adresse', 'mhamd@gmail.com', 1, '2023-03-09 19:15:07', '2023-03-09 19:15:07'),
	(4, 'labrahmi', '0789976543', 'casa', 'labrahmi.nouhayla00@gmail.com', 2, '2023-03-20 13:32:42', '2023-03-20 13:32:52'),
	(5, 'desnet SARL', '222', 'VVVV', 'labrahmi.NNNNNNNNNnouhayla00@gmail.com', 1, '2023-03-22 11:53:12', '2023-03-22 11:53:12'),
	(6, 'batoul', '0669159885', 'misssour', 'lbrahminouhayla@gmail.com', 6, '2023-03-27 13:46:51', '2023-03-27 13:47:08'),
	(7, 'nouhayla', '0789655', 'FES', 'nouhayla@gmail.com', 3, '2023-03-27 13:47:39', '2023-03-27 13:47:39'),
	(8, 'eeeeee', '12345677', 'ASDQ', 'xepoj41035@aosod.com', 1, '2023-03-27 21:03:38', '2023-03-27 21:03:38');

-- Listage de la structure de table gestionstock. images
DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_article_id_foreign` (`article_id`),
  CONSTRAINT `images_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.images : ~15 rows (environ)
INSERT INTO `images` (`id`, `image`, `article_id`, `created_at`, `updated_at`) VALUES
	(2, 'img2', 3, NULL, NULL),
	(3, 'images/pcHp.jpeg', 1, NULL, NULL),
	(5, 'images/78ooWlmRZcnK8ZKkDwfMKfe95c2UVjdQGwHxB5Kl.jpg', 8, '2023-03-06 20:52:33', '2023-03-06 20:52:33'),
	(6, 'images/MuyUtGxO9kGK00fRgRPdJwenJG1E0RSMF4aVCl1R.jpg', 8, '2023-03-06 20:52:33', '2023-03-06 20:52:33'),
	(7, 'images/gx3uPZQExiANcYfLxIkmIW2sv0qkHdKocKcg3GSU.jpg', 9, '2023-03-06 20:57:31', '2023-03-06 20:57:31'),
	(8, 'images/1fF4hsADwKVLG66UIOci66iqMnVrpKMFsRMJoeaQ.jpg', 9, '2023-03-06 20:57:31', '2023-03-06 20:57:31'),
	(18, 'images/fZ7ah0hYCk8EW2bmE2iKOIUZVXsmFLm4LfhVscH2.jpg', 2, '2023-03-07 08:36:18', '2023-03-07 08:36:18'),
	(19, 'images/VocZL0MZAFYCFPZY5IMqR9TI0LRQKOpPYFpYBqN9.jpg', 7, '2023-03-07 19:20:23', '2023-03-07 19:20:23'),
	(20, 'images/bzrVR0Y8lgGcnPQzbfe9HgKLbAM9pJjJj7gfbsai.jpg', 10, '2023-03-09 13:32:25', '2023-03-09 13:32:25'),
	(21, 'images/WkUsIgmFnTKtJX186GOlVpRNrYRLVY6cE7l0Dopn.jpg', 10, '2023-03-09 13:32:25', '2023-03-09 13:32:25'),
	(22, 'images/e0DhlZmPTZ6rwR5P2kYDpLBltSxr3MQHsj04xMF2.jpg', 1, '2023-03-09 18:54:57', '2023-03-09 18:54:57'),
	(23, 'images/MAXSJ5B1NIeasvDPnyL0DkNTgUmkbbCQ5eMPfEkq.jpg', 11, '2023-03-09 18:56:28', '2023-03-09 18:56:28'),
	(24, 'images/pwLznlM7wGBYt1JMIP7xXtXberiXjRBlSSE4TCpW.jpg', 11, '2023-03-09 18:56:28', '2023-03-09 18:56:28'),
	(26, 'images/jWTWZ0t3g9fQs6MzkHDnO1mgtS6ko55ZJoNcfZDA.jpg', 12, '2023-03-09 19:06:15', '2023-03-09 19:06:15'),
	(29, 'images/Bb2h8TNhHpnT59RvV8QEnAF44mqIxWLZOGoVzrDU.jpg', 15, '2023-03-20 13:53:17', '2023-03-20 13:53:17'),
	(30, 'images/Y7oj9oIIPjtofCNRRc1HHdUErbfJE0lmJeb8P4CB.jpg', 16, '2023-03-22 11:50:52', '2023-03-22 11:50:52'),
	(31, 'images/SE54q2MKmcvVAMYhnKvg1LlD5C54tTc3bAbiYNSf.jpg', 20, '2023-03-27 13:03:51', '2023-03-27 13:03:51');

-- Listage de la structure de table gestionstock. marches
DROP TABLE IF EXISTS `marches`;
CREATE TABLE IF NOT EXISTS `marches` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dateCmd` timestamp NOT NULL,
  `numMarche` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fournisseur_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `marches_fournisseur_id_foreign` (`fournisseur_id`),
  CONSTRAINT `marches_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.marches : ~2 rows (environ)
INSERT INTO `marches` (`id`, `dateCmd`, `numMarche`, `created_at`, `updated_at`, `fournisseur_id`) VALUES
	(3, '2023-03-14 21:50:00', 'marche122', '2023-03-14 20:50:56', '2023-03-14 20:50:56', 1),
	(4, '2023-03-14 21:58:10', '123D', NULL, NULL, 2),
	(5, '2023-03-27 00:10:00', '7778/21', '2023-03-27 00:11:21', '2023-03-27 00:11:21', 1),
	(6, '2023-03-27 13:54:00', 'marche122', '2023-03-27 13:54:07', '2023-03-27 13:54:07', 4);

-- Listage de la structure de table gestionstock. migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.migrations : ~24 rows (environ)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2023_03_05_220715_create_categories_table', 1),
	(7, '2023_03_05_220817_create_fournisseurs_table', 1),
	(8, '2023_03_05_221201_create_factures_table', 1),
	(9, '2023_03_05_223332_create_marches_table', 1),
	(10, '2023_03_05_223539_create_bon_cmds_table', 1),
	(11, '2023_03_05_223653_create_emplacements_table', 1),
	(12, '2023_03_05_223736_create_unites_table', 1),
	(13, '2023_03_05_223833_create_articles_table', 1),
	(14, '2023_03_05_224539_create_radiats_table', 1),
	(15, '2023_03_05_225147_create_personnes_table', 2),
	(16, '2023_03_05_225251_create_salles_table', 2),
	(17, '2023_03_05_225323_create_demandes_table', 2),
	(18, '2023_03_05_225955_create_affectations_table', 2),
	(19, '2023_03_05_230713_create_images_table', 3),
	(20, '2023_03_07_112340__add_colomn_deleted_at_to_articles', 4),
	(21, '2023_03_08_202231__add_column_deleted_at_to_salles', 5),
	(22, '2023_03_08_204944__add_column_deleted_at_to_personnes', 6),
	(23, '2023_03_08_221332__add_column_deleted_at_to_users', 7),
	(24, '2023_03_09_084539__add_column_deleted_at_to_emplacements', 8),
	(25, '2023_03_09_084646__add_column_deleted_at_to_unites', 8),
	(26, '2023_03_09_104545__add_column_deleted_at_to_demandes', 9),
	(27, '2023_03_11_222942_create_notifications_table', 10),
	(28, '2023_03_14_204135__add_column_fournisseur_id_to_bon_cmds', 11),
	(29, '2023_03_14_204144__add_column_fournisseur_id_to_marches', 11),
	(30, '2023_03_19_215426__add_column_deleted_at_to_affectations', 12),
	(31, '2023_03_27_112118_create_movements_table', 13),
	(32, '2023_03_28_101627_qte_s_globals', 14);

-- Listage de la structure de table gestionstock. movements
DROP TABLE IF EXISTS `movements`;
CREATE TABLE IF NOT EXISTS `movements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `qteGlobal` double(8,2) DEFAULT NULL,
  `QEntrer` double(8,2) DEFAULT NULL,
  `qteSortie` double(8,2) DEFAULT NULL,
  `dateEntrer` timestamp NULL DEFAULT NULL,
  `dateSortie` timestamp NULL DEFAULT NULL,
  `article_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `movements_article_id_foreign` (`article_id`),
  CONSTRAINT `movements_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.movements : ~18 rows (environ)
INSERT INTO `movements` (`id`, `qteGlobal`, `QEntrer`, `qteSortie`, `dateEntrer`, `dateSortie`, `article_id`, `created_at`, `updated_at`) VALUES
	(1, 123.00, 2.00, 1.00, '2023-03-27 23:07:24', '2023-03-27 23:07:25', 13, NULL, NULL),
	(2, NULL, NULL, 2.00, NULL, '2023-03-28 00:13:30', 2, NULL, NULL),
	(3, NULL, 10.00, NULL, '2023-03-28 00:32:12', NULL, 1, NULL, NULL),
	(4, NULL, 12.00, NULL, NULL, NULL, 18, NULL, NULL),
	(5, NULL, 12.00, NULL, NULL, NULL, 19, NULL, NULL),
	(6, NULL, 12.00, NULL, '2023-03-14 21:58:10', NULL, 1, NULL, NULL),
	(7, NULL, 23.00, NULL, NULL, NULL, 1, NULL, NULL),
	(8, NULL, 12.00, NULL, NULL, NULL, 6, NULL, NULL),
	(9, NULL, 23.00, NULL, '2023-03-14 21:58:10', NULL, 19, NULL, NULL),
	(10, NULL, 3.00, NULL, NULL, NULL, 13, NULL, NULL),
	(11, NULL, 23.00, NULL, '2023-03-27 00:10:00', NULL, 4, NULL, NULL),
	(12, NULL, NULL, 2.00, NULL, '2023-03-28 09:54:01', 1, NULL, NULL),
	(13, NULL, 11.00, NULL, '2023-03-28 10:54:33', NULL, 1, NULL, NULL),
	(14, 33.00, 9.00, NULL, '2023-03-28 10:54:36', NULL, 61, NULL, NULL),
	(15, 100.00, 76.00, NULL, '2023-03-28 10:56:06', NULL, 61, NULL, NULL),
	(16, 100.00, NULL, 8.00, NULL, '2023-03-28 11:04:21', 61, NULL, NULL),
	(17, 100.00, NULL, 10.00, NULL, '2023-03-28 11:13:29', 61, NULL, NULL),
	(18, 110.00, 10.00, NULL, '2023-03-28 11:17:13', NULL, 61, NULL, NULL),
	(19, 110.00, NULL, 46.00, NULL, '2023-03-28 11:22:59', 61, NULL, NULL);

-- Listage de la structure de table gestionstock. notifications
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.notifications : ~32 rows (environ)
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
	('2023-03-25 10:02:28', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":9,"user":1,"demandeurS":4,"demande_id":37}', '2023-03-25 10:08:34', '2023-03-25 10:02:28', NULL),
	('2023-03-27 01:15:58', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"article":"clavier","article_id":1,"qteStock":9.00}', NULL, '2023-03-27 01:15:58', NULL),
	('2023-03-27 13:06:15', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":9,"user":1,"demandeurS":4,"demande_id":38}', NULL, '2023-03-27 13:06:15', NULL),
	('2023-03-27 13:37:52', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":20,"user":9,"demandeurS":4,"demande_id":39}', NULL, '2023-03-27 13:37:52', NULL),
	('2023-03-27 13:46:01', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":43,"user":1,"demandeurS":4,"demande_id":40}', NULL, '2023-03-27 13:46:01', NULL),
	('2023-03-27 14:24:18', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":43,"user":9,"demandeurS":4,"demande_id":41}', NULL, '2023-03-27 14:24:18', NULL),
	('2023-03-27 16:45:35', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":1,"user":15,"demandeurS":8,"demande_id":44}', NULL, '2023-03-27 16:45:35', NULL),
	('2023-03-27 16:47:01', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":16,"user":15,"demandeurS":8,"demande_id":45}', NULL, '2023-03-27 16:47:01', NULL),
	('2023-03-27 17:23:49', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"article":"FAUteuil président en tissu","article_id":16","qteStock":-1.00}', NULL, '2023-03-27 17:23:49', NULL),
	('2023-03-27 17:28:53', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":1,"user":15,"demandeurS":9,"demande_id":46}', NULL, '2023-03-27 17:28:53', NULL),
	('2023-03-27 17:29:19', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"article":"pcHP","article_id":1","qteStock":-9.00}', NULL, '2023-03-27 17:29:19', NULL),
	('2023-03-27 17:32:48', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":7,"user":15,"demandeurS":9,"demande_id":47}', NULL, '2023-03-27 17:32:48', NULL),
	('2023-03-27 17:33:10', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"article":"hegiene","article_id":7","qteStock":-9.00}', NULL, '2023-03-27 17:33:10', NULL),
	('2023-03-27 17:35:53', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":1,"user":21,"demandeurS":9,"demande_id":48}', NULL, '2023-03-27 17:35:53', NULL),
	('2023-03-27 17:36:43', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"article":"pcHP","article_id":1","qteStock":-19.00}', NULL, '2023-03-27 17:36:43', NULL),
	('2023-03-27 17:41:22', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":9,"user":15,"demandeurS":9,"demande_id":49}', NULL, '2023-03-27 17:41:22', NULL),
	('2023-03-27 17:41:42', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"article":"clavier","article_id":9","qteStock":-2.00}', NULL, '2023-03-27 17:41:42', NULL),
	('2023-03-27 17:44:38', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"article":"clavier","article_id":9","qteStock":-12.00}', NULL, '2023-03-27 17:44:38', NULL),
	('2023-03-27 17:48:11', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":9,"user":15,"demandeurS":9,"demande_id":50}', NULL, '2023-03-27 17:48:11', NULL),
	('2023-03-27 17:49:30', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"article":"clavier","article_id":9","qteStock":-22.00}', NULL, '2023-03-27 17:49:30', NULL),
	('2023-03-27 17:55:38', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":7,"user":15,"demandeurS":9,"demande_id":51}', NULL, '2023-03-27 17:55:38', NULL),
	('2023-03-27 17:56:30', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":11,"user":15,"demandeurS":9,"demande_id":52}', NULL, '2023-03-27 17:56:30', NULL),
	('2023-03-27 17:58:35', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"article":"designation","article_id":11","qteStock":9.00}', NULL, '2023-03-27 17:58:35', NULL),
	('2023-03-27 20:35:20', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"article":"sourie","article_id":43","qteStock":40.00}', NULL, '2023-03-27 20:35:20', NULL),
	('2023-03-27 20:37:17', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"article":"ffff","article_id":18","qteStock":1.00}', NULL, '2023-03-27 20:37:17', NULL),
	('2023-03-27 21:06:28', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":1,"user":21,"demandeurS":9,"demande_id":53}', NULL, '2023-03-27 21:06:28', NULL),
	('2023-03-27 21:36:35', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":7,"user":21,"demandeurS":9,"demande_id":54}', NULL, '2023-03-27 21:36:35', NULL),
	('2023-03-27 21:59:08', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 21, '{"article":"hegiene","article_id":"7","qteStock":2.00}', '2023-03-27 22:03:08', '2023-03-27 21:59:08', NULL),
	('2023-03-27 21:59:41', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":1,"user":21,"demandeurS":9,"demande_id":55}', NULL, '2023-03-27 21:59:41', NULL),
	('2023-03-27 22:00:36', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 1, '{"articleD":1,"user":15,"demandeurS":9,"demande_id":56}', NULL, '2023-03-27 22:00:36', NULL),
	('2023-03-28 00:24:51', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 21, '{"article":"pcHP","article_id":"1","qteStock":1.00}', NULL, '2023-03-28 00:24:51', NULL),
	('2023-03-28 09:20:42', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 21, '{"articleD":16,"user":22,"demandeurS":9,"demande_id":60}', NULL, '2023-03-28 09:20:42', NULL),
	('2023-03-28 10:37:32', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 21, '{"article":"ET","article_id":"61","qteStock":3.00}', NULL, '2023-03-28 10:37:32', NULL),
	('2023-03-28 11:12:58', 'App\\Notifications\\TestNotification', 'App\\Models\\User', 21, '{"articleD":61,"user":21,"demandeurS":9,"demande_id":61}', NULL, '2023-03-28 11:12:58', NULL);

-- Listage de la structure de table gestionstock. password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.password_resets : ~0 rows (environ)

-- Listage de la structure de table gestionstock. password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.password_reset_tokens : ~0 rows (environ)

-- Listage de la structure de table gestionstock. personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.personal_access_tokens : ~0 rows (environ)

-- Listage de la structure de table gestionstock. personnes
DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.personnes : ~2 rows (environ)
INSERT INTO `personnes` (`id`, `nom`, `service`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'khaldi', 'informatique', NULL, '2023-03-09 07:27:13', '2023-03-09 07:27:13'),
	(2, 'batoul batoul', 'chimie', '2023-03-08 19:49:04', '2023-03-08 19:51:33', '2023-03-08 19:51:33'),
	(3, 'mhamdi', 'rh', NULL, '2023-03-27 14:30:15', '2023-03-27 14:30:15'),
	(4, 'alaoui', 'mathhh', '2023-03-20 13:48:26', '2023-03-20 13:48:38', '2023-03-20 13:48:38'),
	(5, 'bbk', 'informatique', '2023-03-27 13:59:19', '2023-03-27 13:59:28', '2023-03-27 13:59:28'),
	(6, 'nouhaylazenbb', 'informatique', '2023-03-27 16:53:58', '2023-03-27 16:54:19', '2023-03-27 16:54:19');

-- Listage de la structure de table gestionstock. qtesglobals
DROP TABLE IF EXISTS `qtesglobals`;
CREATE TABLE IF NOT EXISTS `qtesglobals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `qteGlobal` double(8,2) DEFAULT NULL,
  `article_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qtesglobals_article_id_foreign` (`article_id`),
  CONSTRAINT `qtesglobals_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.qtesglobals : ~1 rows (environ)
INSERT INTO `qtesglobals` (`id`, `qteGlobal`, `article_id`, `created_at`, `updated_at`) VALUES
	(1, 110.00, 61, NULL, NULL);

-- Listage de la structure de table gestionstock. radiats
DROP TABLE IF EXISTS `radiats`;
CREATE TABLE IF NOT EXISTS `radiats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `motif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateRadiat` datetime NOT NULL,
  `article_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `radiats_article_id_foreign` (`article_id`),
  CONSTRAINT `radiats_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.radiats : ~8 rows (environ)
INSERT INTO `radiats` (`id`, `motif`, `dateRadiat`, `article_id`, `created_at`, `updated_at`) VALUES
	(1, 'non utilisable', '2023-03-07 00:00:00', 5, '2023-03-07 11:11:31', '2023-03-07 11:11:31'),
	(2, 'non utilisable', '2023-03-06 00:00:00', 3, '2023-03-07 11:12:50', '2023-03-07 11:12:50'),
	(3, 'non utilisable', '2023-03-08 00:00:00', 6, '2023-03-08 08:12:30', '2023-03-08 08:12:30'),
	(4, 'non utilisable', '2023-03-09 20:51:00', 2, '2023-03-09 18:52:02', '2023-03-09 18:52:02'),
	(5, 'faible', '2023-03-20 13:53:00', 15, '2023-03-20 13:53:37', '2023-03-20 13:53:37'),
	(6, 'non utilisable', '2023-03-27 13:41:00', 13, '2023-03-27 13:41:32', '2023-03-27 13:41:32'),
	(7, 'k', '2023-03-27 20:35:00', 43, '2023-03-27 20:35:20', '2023-03-27 20:35:20'),
	(8, 'k', '2023-03-27 20:35:00', 12, '2023-03-27 20:36:04', '2023-03-27 20:36:04'),
	(9, 'k', '2023-03-27 20:37:00', 18, '2023-03-27 20:37:17', '2023-03-27 20:37:17');

-- Listage de la structure de table gestionstock. salles
DROP TABLE IF EXISTS `salles`;
CREATE TABLE IF NOT EXISTS `salles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.salles : ~9 rows (environ)
INSERT INTO `salles` (`id`, `nom`, `service`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'f101', 'chimie', NULL, '2023-03-08 19:35:36', '2023-03-08 19:35:36'),
	(2, 's101', 'chimie', '2023-03-08 19:06:34', '2023-03-09 07:18:53', '2023-03-09 07:18:53'),
	(3, 'd101', 'developpement', '2023-03-09 07:19:12', '2023-03-09 19:53:42', '2023-03-09 19:53:42'),
	(4, 'd101', 'informatique', '2023-03-09 19:53:58', '2023-03-27 14:30:08', '2023-03-27 14:30:08'),
	(5, 'dd203', 'informatique', '2023-03-20 13:48:52', '2023-03-20 13:49:04', '2023-03-20 13:49:04'),
	(6, 'nouhayla', 'chimiennnnnn', '2023-03-27 13:59:39', '2023-03-27 13:59:48', '2023-03-27 13:59:48'),
	(7, 'bb', 'informatique', '2023-03-27 14:29:54', '2023-03-27 14:29:58', '2023-03-27 14:29:58'),
	(8, 'hhhkk', 'informatique', '2023-03-27 16:39:52', '2023-03-27 16:59:45', '2023-03-27 16:59:45'),
	(9, 'nouhaylazen', 'informatique', '2023-03-27 17:00:05', '2023-03-27 17:00:05', NULL);

-- Listage de la structure de table gestionstock. unites
DROP TABLE IF EXISTS `unites`;
CREATE TABLE IF NOT EXISTS `unites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `unite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.unites : ~5 rows (environ)
INSERT INTO `unites` (`id`, `unite`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'kg', NULL, '2023-03-27 14:29:08', '2023-03-27 14:29:08'),
	(2, 'm', NULL, '2023-03-27 14:50:07', '2023-03-27 14:50:07'),
	(3, 'l', NULL, '2023-03-09 07:59:55', '2023-03-09 07:59:55'),
	(4, 'pc', NULL, NULL, NULL),
	(5, 'mm', '2023-03-09 07:41:22', '2023-03-09 07:58:33', '2023-03-09 07:58:33'),
	(6, 'l', '2023-03-09 19:51:51', '2023-03-09 19:52:16', '2023-03-09 19:52:16'),
	(7, 'kg', '2023-03-20 13:49:17', '2023-03-20 13:49:30', '2023-03-20 13:49:30'),
	(8, 'mmmnnnnnnnn', '2023-03-27 13:59:58', '2023-03-27 14:00:07', '2023-03-27 14:00:07'),
	(9, 'ln', '2023-03-27 17:00:47', '2023-03-27 17:01:03', '2023-03-27 17:01:03');

-- Listage de la structure de table gestionstock. users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table gestionstock.users : ~16 rows (environ)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `deleted_at`) VALUES
	(1, 'souhaila', 'souhaila@gmail.com', NULL, '$2y$10$TN4KYgroDeMdAEx9.PwrcuQpkqAKXw7aPeAz7EtL1u094BlI5y4.O', NULL, '2023-03-06 10:01:21', '2023-03-27 14:28:12', 'admin', '2023-03-27 14:28:12'),
	(2, 'bb', 'ELGOTAIBI.ELBATOUL@ofppt-', NULL, '$2y$10$GRcb2PAxfBe4tjFnRcRZr.vRm3VURyPWXaPjhuy5S3wkXYTMbE616', NULL, '2023-03-08 09:37:53', '2023-03-20 13:57:08', 'admin', '2023-03-20 13:57:08'),
	(3, 'khaldi', 'khaldi@gmail.com', NULL, '$2y$10$/vtQWNvFlOYr/6Ni6Ne1CusvT21de4H0Ft5d7KUclbl5ZM9zeKi.W', NULL, '2023-03-08 20:43:29', '2023-03-08 21:17:05', 'admin', '2023-03-08 21:17:05'),
	(5, 'khaldi', 'mhamdi@gmail.com', NULL, '$2y$10$.f4DCH9bbjrLOPXYKyh3regQ2f2YO56/ugBAxIuV91CwmFwo7nfzu', NULL, '2023-03-09 07:21:22', '2023-03-20 13:56:58', 'admin', '2023-03-20 13:56:58'),
	(6, 'marowan', 'mawayo2727@laserlip.com', NULL, '$2y$10$Zd2suUJD3BXBdWBVxsRwZOh0/VVMpebO5Nzl47XFu8OFX5DDAbWlW', NULL, '2023-03-14 15:07:48', '2023-03-27 13:57:57', 'user', '2023-03-27 13:57:57'),
	(7, 'nouhayla', 'labrahmi.nouhayla@gmail.com', NULL, '$2y$10$tsDhDgMLgDuKlgkZk63gN.n9aQlJBt9aAb9yYhnOtOJw5ar/vuFMi', NULL, '2023-03-20 13:28:05', '2023-03-27 14:31:01', 'admin', '2023-03-27 14:31:01'),
	(8, 'labrahmi', 'labrahmi.nouhayla00@gmail.com', NULL, '$2y$10$95IOAp/ZuY4A9ORuLRJvOeYL5Y0zW/yU01QFRfh9yLRfTzc981J0G', NULL, '2023-03-20 13:30:26', '2023-03-20 13:42:29', 'user', '2023-03-20 13:42:29'),
	(9, 'lina', 'lbrahminouhayla@gmail.com', NULL, '$2y$10$C1nIjFiw6fgYaYS5qRLfbe/8PQ40QvJ3awZzMFCc6bifEbdqbqJ5e', NULL, '2023-03-27 13:34:50', '2023-03-27 14:34:23', 'admin', '2023-03-27 14:34:23'),
	(10, 'bb', 'bb@gmail.com', NULL, '$2y$10$oxm.OrWYkq5tya6wV09dkuEv9CkC5mtRObXETcEG4yM8/P.4h16ri', NULL, '2023-03-27 13:57:49', '2023-03-27 14:30:29', 'user', '2023-03-27 14:30:29'),
	(11, 'batoul', 'batoulhhhh@gmail.com', NULL, '$2y$10$AlOr1Io2TSt1TdHAi6ZHaeqxYzYyRtccoB25cBi9nN2IsQL7QLdXy', NULL, '2023-03-27 14:37:03', '2023-03-27 14:43:47', 'admin', '2023-03-27 14:43:47'),
	(14, 'hhhkk', 'hhkk@gmail.com', NULL, '$2y$10$hhzC6B72809qGJiQFpOQQ.5M728FshD1uNrvurOODchFkiGYCGTmi', NULL, '2023-03-27 14:43:23', '2023-03-27 14:43:34', 'user', '2023-03-27 14:43:34'),
	(15, 'nouhaylazen', 'nouhaylalll@gmail.com', NULL, '$2y$10$96xjVbikDo9QhKvRb13nAuEz8CIml2QalzIcl6RQ9kDyjN6cQhY16', NULL, '2023-03-27 14:49:16', '2023-03-27 14:49:16', 'admin', NULL),
	(17, 'batoul', 'batoulhhhh@gmail.comn', NULL, '$2y$10$If75EORgfJKhnXc3r8zPEecxWWpNpRU0T7VUgditBG4K3ov/.26wC', NULL, '2023-03-27 17:02:05', '2023-03-27 17:22:50', 'admin', NULL),
	(19, 'batoul', 'batoulhhhh@gmail.comnn', NULL, '$2y$10$uhcMEhhF0SRu7suStOgNz.1xat1WAA18Omlu7kq6VloR7nQPwOf6O', NULL, '2023-03-27 17:12:28', '2023-03-27 17:12:28', 'user', NULL),
	(20, 'batoul', 'batoulhhhh@gmail.comnnn', NULL, '$2y$10$ltmssuLFWE0Wzh8J.O4e/.T3uYJjBJg60b2o0qIs/iHEPZFey9Er.', NULL, '2023-03-27 17:17:16', '2023-03-27 17:17:16', 'user', NULL),
	(21, 'batoul', 'ELGOTAIBI.ELBATOUL@ofppt-edu.ma', NULL, '$2y$10$DP/EKM2F6SPcd6ryNQ82wujKiC02oZ3x3nVpkZ7oX2OFGbln7LwLS', NULL, '2023-03-27 17:35:27', '2023-03-27 17:35:27', 'admin', NULL),
	(22, 'med', 'med@gmail.com', NULL, '$2y$10$4RogMvn6SGMli5NNIYU1IO.zbYmxe6hK5LP5K2lRTdQ7WOlbRJY8C', NULL, '2023-03-28 09:20:15', '2023-03-28 09:20:15', 'user', NULL);

-- Listage de la structure de déclencheur gestionstock. t4
DROP TRIGGER IF EXISTS `t4`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `t4` AFTER INSERT ON `affectations` FOR EACH ROW BEGIN 
update  demandes 
SET deleted_at=NOW()
WHERE id=NEW.demande_id;
UPDATE articles SET articles.qteStock=(articles.qteStock - (SELECT qteArticle FROM demandes
 INNER JOIN affectations 
ON affectations.demande_id=demandes.id WHERE affectations.id=NEW.id))
WHERE articles.id=(SELECT article_id FROM demandes
 INNER JOIN affectations 
ON affectations.demande_id=demandes.id WHERE affectations.id=NEW.id);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Listage de la structure de déclencheur gestionstock. tArt
DROP TRIGGER IF EXISTS `tArt`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tArt` AFTER INSERT ON `articles` FOR EACH ROW BEGIN 
INSERT INTO qtesglobals (qteGlobal,article_id) VALUE( NEW.qteStock,NEW.id);
end//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Listage de la structure de déclencheur gestionstock. tArticle
DROP TRIGGER IF EXISTS `tArticle`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tArticle` AFTER UPDATE ON `articles` FOR EACH ROW BEGIN 
DECLARE s VARCHAR(200) DEFAULT '{"article":"';
if(NEW.qteStock<NEW.stockMin OR NEW.qteStock<NEW.alert OR NEW.qteStock<NEW.securite) then 
SET s=CONCAT(s,NEW.designation,'","article_id":"',NEW.id,'","qteStock":',NEW.qteStock,'}');
INSERT INTO notifications(id,type,notifiable_id,notifiable_type,DATA,created_at)
VALUES(NOW(),'App\\Notifications\\TestNotification','21','App\\Models\\User',s,NOW());
END if ;
IF (NEW.qteStock>OLD.qteStock) then 
UPDATE qtesglobals SET qteGlobal=qteGlobal+(NEW.qteStock-OLD.qteStock)
WHERE article_id=NEW.id;
INSERT INTO movements(article_id,QEntrer,dateEntrer,qteGlobal)
VALUE ( NEW.id,(NEW.qteStock-OLD.qteStock),NOW(),((SELECT qteglobal FROM qtesglobals WHERE article_id=NEW.id) ));
END if;
IF (NEW.qteStock<OLD.qteStock) then  
INSERT INTO movements(article_id,qteSortie,datesortie,qteGlobal)
VALUE ( NEW.id,(OLD.qteStock-NEW.qteStock),NOW(),((SELECT qteglobal FROM qtesglobals WHERE article_id=NEW.id) ));
END if;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Listage de la structure de déclencheur gestionstock. tDemande
DROP TRIGGER IF EXISTS `tDemande`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tDemande` AFTER INSERT ON `demandes` FOR EACH ROW BEGIN
DECLARE s VARCHAR(200) DEFAULT '{"articleD":';
if(  NEW.personne_id REGEXP '^[0-9]+$') then 
SET s=CONCAT(s,NEW.article_id,',"user":',NEW.user_id,',"demandeurP":',NEW.personne_id,',"demande_id":',NEW.id,'}');
END if ;
if(NEW.salle_id REGEXP '^[0-9]+$') then 
SET s=CONCAT(s,NEW.article_id,',"user":',NEW.user_id,',"demandeurS":',NEW.salle_id,',"demande_id":',NEW.id,'}');
END if ;
INSERT INTO notifications(id,type,notifiable_id,notifiable_type,DATA,created_at)
VALUES(NOW(),'App\\Notifications\\TestNotification','21','App\\Models\\User',s,NOW());
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
