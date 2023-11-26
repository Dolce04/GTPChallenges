<?php
session_start();
include_once("db.inc.php");
include_once("functions.php");


if (isset($_POST['submit_button'])) {

    $naam = cleaningData($_POST['naam']);
    if (!preg_match("/^[a-zA-Z ]{2,50}$/", $naam) || trim($naam) == '') {
        $_SESSION['foutmelding'] = "De string bevat andere tekens dan alleen letters en spaties.";
        $_SESSION['formulierData'] = $_POST;
        header("Location: index.php");
        exit();
    }
    $email = cleaningAndValidateEmail($_POST['email']);
    if (empty($email)) {
        $_SESSION['foutmelding'] = "Het opgegeven e-mailadres is niet geldig.";
        $_SESSION['formulierData'] = $_POST;
        header("Location: index.php");
        exit();
    }
    $bericht = cleaningData($_POST['bericht']);
    if (strlen($bericht) >= 256 ) {
        $_SESSION['foutmelding'] = "To many characters used in your message, the max is 255.";
        $_SESSION['formulierData'] = $_POST;
        header("Location: index.php");
        exit();
    }
    if (empty($bericht) || strlen($bericht < 3)) {
        $_SESSION['foutmelding'] = "Controleer uw bericht, het bericht mag niet kleiner zijn dan 2 tekens.";
        $_SESSION['formulierData'] = $_POST;
        header("Location: index.php");
        exit();
    }   
    $berichtType = $_POST['berichtType'];
    if ($_POST['berichtType'] != 'else' && $_POST['berichtType'] != 'question' && $_POST['berichtType'] != 'feedback') {
        $_SESSION['foutmelding'] = "Selecteer een geldige berichten optie";
        $_SESSION['formulierData'] = $_POST;
        header("Location: index.php");
        exit();
    }

    $_SESSION['naam'] = $naam;
    $_SESSION['berichtType'] = $_POST['berichtType'];

    try {
        $query = 'INSERT INTO Berichten (
            naam,
            email,
            bericht,
            berichtType
            ) VALUES (
            :naam,
            :email,
            :bericht,
            :berichtType
            )';
            $stmt = $pdo->prepare($query);
            $data = [
                'naam' => $naam,
                'email' => $email,
                'bericht' => $bericht,
                'berichtType' => $berichtType
            ];
            $query_execute = $stmt->execute($data);
            if ($query_execute) {
                header('Location:succes.php');
                exit(0);
            }
    } catch (PDOException $err) {
        echo "Error in database: " . $err->getMessage();
    } catch (Exception $err) {
        echo "Error: " . $err->getMessage();
    }
} else {
    header("Location: index.php");
}