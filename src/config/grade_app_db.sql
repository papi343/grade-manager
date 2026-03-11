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

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    prenom VARCHAR(50) DEFAULT NULL,
    nom VARCHAR(50) DEFAULT NULL,
    email VARCHAR(100) DEFAULT NULL,
    password VARCHAR(200) DEFAULT NULL,
    role VARCHAR(20) NOT NULL,
    classe_id INT DEFAULT NULL,
    password_verify_at TIMESTAMP DEFAULT null,
    FOREIGN KEY (classe_id) REFERENCES classes(id) ON DELETE SET NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
--
alter table users add column password_verify_at timestamp DEFAULT NULL;
alter table users add column is_active boolean DEFAULT true;
  

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

--seeding data for user


INSERT INTO users (prenom, nom, email, password, role, classe_id) VALUES
('Amadou','Diallo','','123456','student',1),
('Moussa','Ba','moussa2@school.com','123456','student',2),
('Ibrahima','Ndiaye','ibrahima3@school.com','123456','student',3),
('Cheikh','Diop','cheikh4@school.com','123456','student',4),
('Ousmane','Fall','ousmane5@school.com','123456','student',5),
('Aliou','Sarr','aliou6@school.com','123456','student',6),
('Babacar','Sow','babacar7@school.com','123456','student',7),
('Abdou','Gueye','abdou8@school.com','123456','student',8),
('Pape','Seck','pape9@school.com','123456','student',9),
('Serigne','Mbaye','serigne10@school.com','123456','student',10),

('Amadou','Diallo','amadou11@school.com','123456','student',11),
('Moussa','Ba','moussa12@school.com','123456','student',12),
('Ibrahima','Ndiaye','ibrahima13@school.com','123456','student',13),
('Cheikh','Diop','cheikh14@school.com','123456','student',14),
('Ousmane','Fall','ousmane15@school.com','123456','student',15),
('Aliou','Sarr','aliou16@school.com','123456','student',16),
('Babacar','Sow','babacar17@school.com','123456','student',17),
('Abdou','Gueye','abdou18@school.com','123456','student',18),
('Pape','Seck','pape19@school.com','123456','student',19),
('Serigne','Mbaye','serigne20@school.com','123456','student',20),

('Amadou','Diallo','amadou21@school.com','123456','student',1),
('Moussa','Ba','moussa22@school.com','123456','student',2),
('Ibrahima','Ndiaye','ibrahima23@school.com','123456','student',3),
('Cheikh','Diop','cheikh24@school.com','123456','student',4),
('Ousmane','Fall','ousmane25@school.com','123456','student',5),
('Aliou','Sarr','aliou26@school.com','123456','student',6),
('Babacar','Sow','babacar27@school.com','123456','student',7),
('Abdou','Gueye','abdou28@school.com','123456','student',8),
('Pape','Seck','pape29@school.com','123456','student',9),
('Serigne','Mbaye','serigne30@school.com','123456','student',10),

('Amadou','Diallo','amadou31@school.com','123456','student',11),
('Moussa','Ba','moussa32@school.com','123456','student',12),
('Ibrahima','Ndiaye','ibrahima33@school.com','123456','student',13),
('Cheikh','Diop','cheikh34@school.com','123456','student',14),
('Ousmane','Fall','ousmane35@school.com','123456','student',15),
('Aliou','Sarr','aliou36@school.com','123456','student',16),
('Babacar','Sow','babacar37@school.com','123456','student',17),
('Abdou','Gueye','abdou38@school.com','123456','student',18),
('Pape','Seck','pape39@school.com','123456','student',19),
('Serigne','Mbaye','serigne40@school.com','123456','student',20),

('Amadou','Diallo','amadou41@school.com','123456','student',1),
('Moussa','Ba','moussa42@school.com','123456','student',2),
('Ibrahima','Ndiaye','ibrahima43@school.com','123456','student',3),
('Cheikh','Diop','cheikh44@school.com','123456','student',4),
('Ousmane','Fall','ousmane45@school.com','123456','student',5),
('Aliou','Sarr','aliou46@school.com','123456','student',6),
('Babacar','Sow','babacar47@school.com','123456','student',7),
('Abdou','Gueye','abdou48@school.com','123456','student',8),
('Pape','Seck','pape49@school.com','123456','student',9),
('Serigne','Mbaye','serigne50@school.com','123456','student',10),

('Amadou','Diallo','amadou51@school.com','123456','student',11),
('Moussa','Ba','moussa52@school.com','123456','student',12),
('Ibrahima','Ndiaye','ibrahima53@school.com','123456','student',13),
('Cheikh','Diop','cheikh54@school.com','123456','student',14),
('Ousmane','Fall','ousmane55@school.com','123456','student',15),
('Aliou','Sarr','aliou56@school.com','123456','student',16),
('Babacar','Sow','babacar57@school.com','123456','student',17),
('Abdou','Gueye','abdou58@school.com','123456','student',18),
('Pape','Seck','pape59@school.com','123456','student',19),
('Serigne','Mbaye','serigne60@school.com','123456','student',20),

('Amadou','Diallo','amadou61@school.com','123456','student',1),
('Moussa','Ba','moussa62@school.com','123456','student',2),
('Ibrahima','Ndiaye','ibrahima63@school.com','123456','student',3),
('Cheikh','Diop','cheikh64@school.com','123456','student',4),
('Ousmane','Fall','ousmane65@school.com','123456','student',5),
('Aliou','Sarr','aliou66@school.com','123456','student',6),
('Babacar','Sow','babacar67@school.com','123456','student',7),
('Abdou','Gueye','abdou68@school.com','123456','student',8),
('Pape','Seck','pape69@school.com','123456','student',9),
('Serigne','Mbaye','serigne70@school.com','123456','student',10),

('Amadou','Diallo','amadou71@school.com','123456','student',11),
('Moussa','Ba','moussa72@school.com','123456','student',12),
('Ibrahima','Ndiaye','ibrahima73@school.com','123456','student',13),
('Cheikh','Diop','cheikh74@school.com','123456','student',14),
('Ousmane','Fall','ousmane75@school.com','123456','student',15),
('Aliou','Sarr','aliou76@school.com','123456','student',16),
('Babacar','Sow','babacar77@school.com','123456','student',17),
('Abdou','Gueye','abdou78@school.com','123456','student',18),
('Pape','Seck','pape79@school.com','123456','student',19),
('Serigne','Mbaye','serigne80@school.com','123456','student',20),

('Amadou','Diallo','amadou81@school.com','123456','student',1),
('Moussa','Ba','moussa82@school.com','123456','student',2),
('Ibrahima','Ndiaye','ibrahima83@school.com','123456','student',3),
('Cheikh','Diop','cheikh84@school.com','123456','student',4),
('Ousmane','Fall','ousmane85@school.com','123456','student',5),
('Aliou','Sarr','aliou86@school.com','123456','student',6),
('Babacar','Sow','babacar87@school.com','123456','student',7),
('Abdou','Gueye','abdou88@school.com','123456','student',8),
('Pape','Seck','pape89@school.com','123456','student',9),
('Serigne','Mbaye','serigne90@school.com','123456','student',10),

('Amadou','Diallo','amadou91@school.com','123456','student',11),
('Moussa','Ba','moussa92@school.com','123456','student',12),
('Ibrahima','Ndiaye','ibrahima93@school.com','123456','student',13),
('Cheikh','Diop','cheikh94@school.com','123456','student',14),
('Ousmane','Fall','ousmane95@school.com','123456','student',15),
('Aliou','Sarr','aliou96@school.com','123456','student',16),
('Babacar','Sow','babacar97@school.com','123456','student',17),
('Abdou','Gueye','abdou98@school.com','123456','student',18),
('Pape','Seck','pape99@school.com','123456','student',19),
('Serigne','Mbaye','serigne100@school.com','123456','student',20),

('Amadou','Diallo','amadou101@school.com','123456','student',1),
('Moussa','Ba','moussa102@school.com','123456','student',2),
('Ibrahima','Ndiaye','ibrahima103@school.com','123456','student',3),
('Cheikh','Diop','cheikh104@school.com','123456','student',4),
('Ousmane','Fall','ousmane105@school.com','123456','student',5),
('Aliou','Sarr','aliou106@school.com','123456','student',6),
('Babacar','Sow','babacar107@school.com','123456','student',7),
('Abdou','Gueye','abdou108@school.com','123456','student',8),
('Pape','Seck','pape109@school.com','123456','student',9),
('Serigne','Mbaye','serigne110@school.com','123456','student',10),

('Amadou','Diallo','amadou111@school.com','123456','student',11),
('Moussa','Ba','moussa112@school.com','123456','student',12),
('Ibrahima','Ndiaye','ibrahima113@school.com','123456','student',13),
('Cheikh','Diop','cheikh114@school.com','123456','student',14),
('Ousmane','Fall','ousmane115@school.com','123456','student',15),
('Aliou','Sarr','aliou116@school.com','123456','student',16),
('Babacar','Sow','babacar117@school.com','123456','student',17),
('Abdou','Gueye','abdou118@school.com','123456','student',18),
('Pape','Seck','pape119@school.com','123456','student',19),
('Serigne','Mbaye','serigne120@school.com','123456','student',20),

('Amadou','Diallo','amadou121@school.com','123456','student',1),
('Moussa','Ba','moussa122@school.com','123456','student',2),
('Ibrahima','Ndiaye','ibrahima123@school.com','123456','student',3),
('Cheikh','Diop','cheikh124@school.com','123456','student',4),
('Ousmane','Fall','ousmane125@school.com','123456','student',5),
('Aliou','Sarr','aliou126@school.com','123456','student',6),
('Babacar','Sow','babacar127@school.com','123456','student',7),
('Abdou','Gueye','abdou128@school.com','123456','student',8),
('Pape','Seck','pape129@school.com','123456','student',9),
('Serigne','Mbaye','serigne130@school.com','123456','student',10),

('Amadou','Diallo','amadou131@school.com','123456','student',11),
('Moussa','Ba','moussa132@school.com','123456','student',12),
('Ibrahima','Ndiaye','ibrahima133@school.com','123456','student',13),
('Cheikh','Diop','cheikh134@school.com','123456','student',14),
('Ousmane','Fall','ousmane135@school.com','123456','student',15),
('Aliou','Sarr','aliou136@school.com','123456','student',16),
('Babacar','Sow','babacar137@school.com','123456','student',17),
('Abdou','Gueye','abdou138@school.com','123456','student',18),
('Pape','Seck','pape139@school.com','123456','student',19),
('Serigne','Mbaye','serigne140@school.com','123456','student',20),

('Amadou','Diallo','amadou141@school.com','123456','student',1),
('Moussa','Ba','moussa142@school.com','123456','student',2),
('Ibrahima','Ndiaye','ibrahima143@school.com','123456','student',3),
('Cheikh','Diop','cheikh144@school.com','123456','student',4),
('Ousmane','Fall','ousmane145@school.com','123456','student',5),
('Aliou','Sarr','aliou146@school.com','123456','student',6),
('Babacar','Sow','babacar147@school.com','123456','student',7),
('Abdou','Gueye','abdou148@school.com','123456','student',8),
('Pape','Seck','pape149@school.com','123456','student',9),
('Serigne','Mbaye','serigne150@school.com','123456','student',10);

--seeding data for teacher

-- INSERT INTO users (prenom, nom, email, password, role, classe_id) VALUES
-- ('Mamadou','Diop','prof1@school.com','123456','teacher',NULL),
-- ('Fatou','Ndiaye','prof2@school.com','123456','teacher',NULL),
-- ('Cheikh','Fall','prof3@school.com','123456','teacher',NULL),
-- ('Aminata','Ba','prof4@school.com','123456','teacher',NULL),
-- ('Oumar','Sarr','prof5@school.com','123456','teacher',NULL),
-- ('Awa','Gueye','prof6@school.com','123456','teacher',NULL),
-- ('Babacar','Sow','prof7@school.com','123456','teacher',NULL),
-- ('Mariama','Seck','prof8@school.com','123456','teacher',NULL),
-- ('Ibrahima','Mbaye','prof9@school.com','123456','teacher',NULL),
-- ('Khadija','Diallo','prof10@school.com','123456','teacher',NULL);

--seeding data for matieres

INSERT INTO matieres (libelle, professeur_id, classe_id, semestre_id, coef) VALUES
('Algorithmique',1,1,1,4),
('Programmation C',2,1,1,4),
('Structure de données',3,2,1,3),
('Base de données',4,2,1,4),
('Mathématiques',5,3,1,3),
('Réseaux',6,3,2,4),
('Systèmes d exploitation',7,4,2,4),
('Programmation Web',8,4,2,3),
('Architecture ordinateur',9,5,1,3),
('Analyse numérique',10,5,1,2),

('Java',1,6,2,4),
('Python',2,6,2,3),
('Dev Web avancé',3,7,2,4),
('Administration réseau',4,7,1,3),
('Machine Learning',5,8,2,5),
('Data Mining',6,8,2,4),
('Compilation',7,9,1,4),
('Cloud Computing',8,9,2,3),
('Sécurité informatique',9,10,2,4),
('Intelligence artificielle',10,10,2,5),

('Programmation mobile',1,11,2,3),
('Big Data',2,11,2,4),
('Analyse de données',3,12,1,3),
('Gestion de projet',4,12,1,2),
('Systèmes distribués',5,13,2,4),
('Blockchain',6,13,2,3),
('Robotique',7,14,1,4),
('Vision par ordinateur',8,14,2,3),
('Deep Learning',9,15,2,5),
('DevOps',10,15,2,4);







