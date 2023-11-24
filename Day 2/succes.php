<?php
session_start();
include_once("db.inc.php");
include_once("functions.php");
// if (!isset($_SESSION['foutmelding'])) {
//     header('Location: index.php');
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Thank you <?=htmlspecialchars(ucfirst($_SESSION['naam'])) ?? ''?> for your email</title>
</head>
<body>
    <div class="container">
        <div class="content_container">
            <h2>Thank you for your email <?=htmlspecialchars(ucfirst($_SESSION['naam'])) ?? ''?>, we'll get back to you soon.</h2>
            <a class="a_button" href="index.php"><<</a>
        </div>
    </div>
</body>
</html>