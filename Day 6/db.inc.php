<?php
//offline config.php ophalen ter voorkoming van blootstelling gevoelige informatie aan de buitenwereld.
require_once("../../config/GPTchallenge/config.php");

//maak een pdo connectie.
$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);