DROP DATABASE IF EXISTS `GPTchallenges`;

CREATE DATABASE `GPTchallenges`;

USE `GPTchallenges`;

CREATE TABLE `Berichten` (
    `id` INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `naam` VARCHAR(100) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `bericht` VARCHAR(255) NOT NULL,
    `berichtType` enum('feedback', 'question', 'else') NOT NULL
);

ALTER TABLE `Berichten` ADD (
    `prio` enum('low', 'medium', 'high') NOT NULL,
    `contactvoorkeur` enum('e-mail', 'telefonisch') NOT NULL
);