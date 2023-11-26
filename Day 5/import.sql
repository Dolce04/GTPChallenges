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








-- indien nodig, 15 fictieve inserts:

-- INSERT INTO Berichten (naam, email, bericht, berichtType, prio, contactvoorkeur) VALUES 
-- ('Alice', 'alice@example.com', 'Dit is een feedback bericht', 'feedback', 'low', 'e-mail'),
-- ('Bob', 'bob@example.com', 'Ik heb een vraag over mijn bestelling', 'question', 'medium', 'telefonisch'),
-- ('Charlie', 'charlie@example.com', 'Ik wil graag meer informatie', 'else', 'high', 'e-mail'),
-- ('David', 'david@example.com', 'Uitstekende service!', 'feedback', 'low', 'e-mail'),
-- ('Eva', 'eva@example.com', 'Kan ik mijn bestelling wijzigen?', 'question', 'medium', 'telefonisch'),
-- ('Frank', 'frank@example.com', 'Een suggestie voor verbetering', 'else', 'high', 'e-mail'),
-- ('Grace', 'grace@example.com', 'Goede ervaring met jullie producten', 'feedback', 'low', 'e-mail'),
-- ('Hannah', 'hannah@example.com', 'Hoe lang is de levertijd?', 'question', 'medium', 'telefonisch'),
-- ('Ivan', 'ivan@example.com', 'Kan ik korting krijgen?', 'else', 'high', 'e-mail'),
-- ('Julia', 'julia@example.com', 'Heel tevreden met de klantenservice', 'feedback', 'low', 'e-mail'),
-- ('Kevin', 'kevin@example.com', 'Wat zijn de verzendkosten?', 'question', 'medium', 'telefonisch'),
-- ('Liam', 'liam@example.com', 'Kunnen jullie dit product aanbevelen?', 'else', 'high', 'e-mail'),
-- ('Mia', 'mia@example.com', 'Fantastisch product!', 'feedback', 'low', 'e-mail'),
-- ('Noah', 'noah@example.com', 'Wanneer komt mijn bestelling aan?', 'question', 'medium', 'telefonisch'),
-- ('Olivia', 'olivia@example.com', 'Ik wil mijn bestelling annuleren', 'else', 'high', 'e-mail');
