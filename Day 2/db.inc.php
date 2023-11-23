<?php

//maak connectie variabelen 

$dbname = "DayOne";
$dbhost = "localhost";
$dbuser = "bit_academy";
$dbpass = "bit_academy";

//maak DSN (Data source name) :het bevat de nodige informatie om verbinding te maken met een database.
$dsn = "mysql:host=$dbhost;dbname=$dbname";

//maak een pdo connectie.
$pdo = new PDO($dsn, $dbuser, $dbpass);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);