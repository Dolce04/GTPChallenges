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

ALTER TABLE `Berichten` ADD 
    `prio` enum('low', 'medium', 'high') NOT NULL,
    `contactvoorkeur` enum('e-mail', 'telefonisch') NOT NULL;

ALTER TABLE `Berichten` ADD
    `status` enum('unseen', 'seen') NOT NULL;






-- indien nodig, 30 fictieve inserts:

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
-- ('Paul', 'paul@example.com', 'Kan ik mijn leveradres wijzigen?', 'question', 'medium', 'e-mail'),
-- ('Quinn', 'quinn@example.com', 'Hebben jullie ook eco-vriendelijke producten?', 'feedback', 'low', 'telefonisch'),
-- ('Rachel', 'rachel@example.com', 'Ik wil een klacht indienen over een product', 'else', 'high', 'e-mail'),
-- ('Steve', 'steve@example.com', 'Zeer tevreden met de snelle respons', 'feedback', 'low', 'e-mail'),
-- ('Tina', 'tina@example.com', 'Hoe kan ik een product retourneren?', 'question', 'medium', 'telefonisch'),
-- ('Uma', 'uma@example.com', 'Ik heb een idee voor een nieuw product', 'else', 'high', 'e-mail'),
-- ('Victor', 'victor@example.com', 'Bedankt voor de uitstekende service!', 'feedback', 'low', 'e-mail'),
-- ('Wendy', 'wendy@example.com', 'Wat is de garantieperiode van mijn product?', 'question', 'medium', 'telefonisch'),
-- ('Xander', 'xander@example.com', 'Kunnen jullie meer informatie geven over de materialen?', 'else', 'high', 'e-mail'),
-- ('Yasmin', 'yasmin@example.com', 'Ik waardeer jullie snelle levering', 'feedback', 'low', 'e-mail'),
-- ('Zach', 'zach@example.com', 'Zijn er momenteel kortingen of promoties?', 'question', 'medium', 'telefonisch'),
-- ('Amber', 'amber@example.com', 'Ik heb een suggestie voor jullie website', 'else', 'high', 'e-mail'),
-- ('Bruce', 'bruce@example.com', 'Jullie klantenservice is top!', 'feedback', 'low', 'e-mail'),
-- ('Cindy', 'cindy@example.com', 'Hoe volg ik mijn bestelling op?', 'question', 'medium', 'telefonisch'),
-- ('Derek', 'derek@example.com', 'Is dit product ook in andere kleuren beschikbaar?', 'else', 'high', 'e-mail');
