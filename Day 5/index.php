<?php
session_start();
include_once("db.inc.php");
include_once("functions.php");

if (isset($_SESSION['foutmelding'])) {
    echo "<div class='popup'>" . htmlspecialchars($_SESSION['foutmelding']) . "</div>";
    unset($_SESSION['foutmelding']);
}

$formulierData = isset($_SESSION['formulierData']) ? $_SESSION['formulierData'] : [];
unset($_SESSION['formulierData']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GPTchallenge</title>
</head>
<body>
    <div class="container">
        <div class="content_container">
            <p><a class="admin" href="admin.php">GPTchallenge Day 4</a></p>
            <div class="image_wrapper">
                <img src="susan_csa.png" alt="">
            </div>
        </div>
        <div class="form_container">
            <form method="POST" action="code.php">

                <label for="naam" class="labels">Naam:</label>
                <input class="input" type="text" name="naam" id="naam" placeholder="John Appleseed" value="<?=htmlspecialchars($formulierData['naam'] ?? '')?>" required>

                <label for="emailField" class="labels">Email:</label>
                <input class="input" type="email" name="email" id="emailField" pattern=".+@([a-z0-9.-]+)\.[a-z]{2,}$" autocomplete="email" placeholder="John_appleseed@apple.com" value="<?=htmlspecialchars($formulierData['email'] ?? '')?>"required>

                <label for="berichtField" class="labels">Bericht:</label>
                <label for="berichtField" class="droplabels">Soort:</label>
                <select name="berichtType" id="berichtField" class="dropdown_small">
                    <option value="selecteer" disabled<?php if (!isset($formulierData['berichtType'])) echo ' selected'; ?>>Selecteer</option>
                    <option value="feedback"<?php if ($formulierData['berichtType'] == 'feedback') echo ' selected'; ?>>Feedback</option>
                    <option value="question"<?php if ($formulierData['berichtType'] == 'question') echo ' selected'; ?>>Vraag</option>
                    <option value="else"<?php if ($formulierData['berichtType'] == 'else') echo ' selected'; ?>>Anders..</option>
                </select>
                <label for="prioField" class="droplabels">Prio:</option>
                <select name="prioType" id="prioField" class="dropdown_small">
                    <option value="selecteer" disabled<?php if (!isset($_formulierData['prioType'])) echo ' selected'; ?>>Selecteer</option>
                    <option value="low"<?php if ($formulierData['prioType'] == 'low') echo ' selected'; ?>>Laag</option>
                    <option value="medium"<?php if ($formulierData['prioType'] == 'medium') echo ' selected'; ?>>Gemiddeld</option>
                    <option value="high"<?php if ($formulierData['prioType'] == 'high') echo ' selected'; ?>>Hoog!</option>
                </select>
                <textarea name="bericht" id="berichtField" cols="30" rows="10" value=""><?=htmlspecialchars($formulierData['bericht'] ?? '')?></textarea>
                <p class="mchar">Max 255.</p>

                <label for="contactMeField" class="labels">Contactvoorkeur:</label>
                    <select name="contactMeType" id="contactMeField" class="dropdown">
                        <option value="selecteer" disabled<?php if (!isset($formulierData['contactMeType'])) echo ' selected'; ?>>Selecteer...</option>
                        <option value="e-mail"<?php if ($formulierData['contactMeType'] == 'e-mail') echo ' selected'; ?>>E-mail</option>
                        <option value="telefonisch"<?php if ($formulierData['contactMeType'] == 'telefonisch') echo ' selected'; ?>>Telefonisch</option>
                    </select>

                <button class="button" type="submit" name="submit_button">Verstuur</button>
            </form>
        </div>
    </div>
</body>
</html>