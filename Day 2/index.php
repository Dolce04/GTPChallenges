<?php
include_once("db.inc.php");
include_once("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Day1 - Contactformulier GPTchallenge</title>
</head>
<body>
    <div class="container">
        <div class="content_container">
            <p>GPTchallenge Day 1</p>
            <div class="image_wrapper">
            <img src="susan_csa.png" alt="">
        </div>
        <div class="form_container">
            <form method="POST" action="code.php">
                <label for="naam" class="labels">Naam</label>
                <input class="input" type="text" name="naam" id="naam" placeholder="John Appleseed" required>

                <label for="emailField" class="labels">Email</label>
                <input class="input" type="email" name="email" id="emailField" pattern=".+@([a-z0-9.-]+)\.[a-z]{2,}$" autocomplete="email" placeholder="John_appleseed@apple.com" required>

                <label for="berichtField" class="labels">Bericht</label>
                <textarea name="bericht" id="berichtField" cols="30" rows="10"></textarea>

                <button class="button" type="submit" name="submit_button">Verstuur</button>
            </form>
        </div>
    </div>
</body>
</html>