-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20251213.b8e87b4f4f
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2026 at 09:20 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `grade_app_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `grade_app_db`;

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `prenom` VARCHAR(50) DEFAULT NULL,
    `nom` VARCHAR(50) DEFAULT NULL,
    `email` VARCHAR(100) DEFAULT NULL,
    `password` VARCHAR(200) DEFAULT NULL,
    `role` VARCHAR(20) NOT NULL,
    `classe_id` INT DEFAULT NULL,
    FOREIGN KEY (`classe_id`) REFERENCES `classes`(`id`) ON DELETE SET NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE IF NOT EXISTS `classes` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `filiere` varchar(50) DEFAULT NULL,
  `niveau` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



CREATE TABLE IF NOT EXISTS `matieres` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  `professeur_id` int DEFAULT NULL,
  `classe_id` int DEFAULT NULL,
  `semestre_id` int DEFAULT NULL,
  `coef` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`professeur_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`classe_id`) REFERENCES `classes`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`semestre_id`) REFERENCES `semestres`(`id`) ON DELETE SET NULL
);



CREATE TABLE IF NOT EXISTS `notes` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `note` float NOT NULL,
  `semestre_id` int DEFAULT NULL,
  `matiere_id` int DEFAULT NULL,
  `etudiant_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`semestre_id`) REFERENCES `semestres`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`matiere_id`) REFERENCES `matieres`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`etudiant_id`) REFERENCES `users`(`id`) ON DELETE SET NULL
);



CREATE TABLE IF NOT EXISTS `semestres` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nomSemestre` varchar(50) DEFAULT NULL
);


CREATE TABLE IF NOT EXISTS `enseignements` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `professeur_id` int DEFAULT NULL,
  `matiere_id` int DEFAULT NULL,
  `classe_id` int DEFAULT NULL,
  `semestre_id` int DEFAULT NULL,
  FOREIGN KEY (`professeur_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`matiere_id`) REFERENCES `matieres`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`classe_id`) REFERENCES `classes`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`semestre_id`) REFERENCES `semestres`(`id`) ON DELETE SET NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- seeding data for semestres
INSERT INTO `semestres` (`nomSemestre`) VALUES
('Semestre 1'),
('Semestre 2'),
('Semestre 3'),
('Semestre 4'),
('Semestre 5'),
('Semestre 6');

-- seeding data for classes
INSERT INTO `classes` (`filiere`, `niveau`) VALUES
('Scientifique', 'Terminale'),
('Littéraire', 'Terminale'),
('Économique', 'Terminale'),
('Scientifique', 'Première'),
('Littéraire', 'Première');


-- seeding data for matieres

-- seeding data for classes
INSERT INTO `classes` (`filiere`, `niveau`) VALUES
('GL', 'L1'),
('GL', 'L2'),
('GL', 'L3'),
('GL', 'M1'),
('GL', 'M2'), 
('RI', 'L1'),
('RI', 'L2'),
('RI', 'L3'),
('RI', 'M1'),
('RI', 'M2'),
('CS', 'L1'),
('CS', 'L2'),
('CS', 'L3'),
('CS', 'M1'),
('CS', 'M2'),
('IAGE', 'L1'),
('IAGE', 'L2'),
('IAGE', 'L3'),
('IAGE', 'M1'),
('IAGE', 'M2');







