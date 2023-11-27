<?php
session_start();
include_once("db.inc.php");
include_once("functions.php");

$logFileDB = "../../logs/logs_GPTchallenge/Day 6/db.error.txt";
$logFileError = "../../logs/logs_GPTchallenge/Day 6/error.txt";
$logMsg = "";

if (isset($_POST['submit_button'])) {

    // POST variables:
    $naam = cleaningData($_POST['naam']);
    $email = cleaningAndValidateEmail($_POST['email']);
    $bericht = cleaningData($_POST['bericht']);
    $berichtType = $_POST['berichtType'];
    $prio = $_POST['prioType'];
    $contactvoorkeur = $_POST['contactMeType'];

    // Session variables:
    $_SESSION['naam'] = $naam;
    $_SESSION['berichtType'] = $_POST['berichtType'];

    // Server side validation & Session error handling:
    if (!preg_match("/^[a-zA-Z ]{2,50}$/", $naam) || trim($naam) == '') {
        $_SESSION['foutmelding'] = "De string bevat andere tekens dan alleen letters en spaties.";
        $_SESSION['formulierData'] = $_POST;
        header("Location: index.php");
        exit();
    }
    if (empty($email)) {
        $_SESSION['foutmelding'] = "Het opgegeven e-mailadres is niet geldig.";
        $_SESSION['formulierData'] = $_POST;
        header("Location: index.php");
        exit();
    }
    if (strlen($bericht) >= 256 ) {
        $_SESSION['foutmelding'] = "Too many characters used in your message, the max is 255.";
        $_SESSION['formulierData'] = $_POST;
        header("Location: index.php");
        exit();
    }
    $berichtTypeWaarden = ['feedback', 'question', 'else'];
    if (!in_array($berichtType, $berichtTypeWaarden)) {
        $_SESSION['foutmelding'] = "Selecteer een geldige berichten optie";
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
    $prioTypeWaarden = ['low', 'medium', 'high'];
    if (!in_array($prio, $prioTypeWaarden)) {
        $_SESSION['foutmelding'] = "Selecteer aub een prio";
        $_SESSION['formulierData'] = $_POST;
        header("Location: index.php");
        exit();
    }
    $contactMeTypeWaarden = ['e-mail', 'telefonisch'];
    if (!in_array($contactvoorkeur, $contactMeTypeWaarden)) {
        $_SESSION['foutmelding'] = "Selecteer aub een Contactvoorkeur";
        $_SESSION['formulierData'] = $_POST;
        header("Location: index.php");
        exit();
    }

    // Insert query with try and catch:
    try {
        $query = 'INSERT INTO Berichten (
            naam,
            email,
            bericht,
            berichtType,
            prio,
            contactvoorkeur
            ) VALUES (
            :naam,
            :email,
            :bericht,
            :berichtType,
            :prio,
            :contactvoorkeur
            )';
            $stmt = $pdo->prepare($query);
            $data = [
                'naam' => $naam,
                'email' => $email,
                'bericht' => $bericht,
                'berichtType' => $berichtType,
                'prio' => $prio,
                'contactvoorkeur' => $contactvoorkeur
            ];
            $query_execute = $stmt->execute($data);
            if ($query_execute) {
                header('Location:succes.php');
                exit(0);
            }
    } catch (PDOException $err) {
        file_put_contents($logFileDB, $err->getMessage() . PHP_EOL, FILE_APPEND);
    } catch (Exception $err) {
        file_put_contents($logFileError, $err->getMessage() . PHP_EOL, FILE_APPEND);
    }
} else {
    header("Location: index.php");
}