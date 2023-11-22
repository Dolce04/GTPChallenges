<?php
include_once("db.inc.php");
include_once("functions.php");

if (isset($_POST['submit_button'])) {
    $naam = cleaningData($_POST['naam']);
    if (!preg_match("/^[a-zA-Z ]{2,50}$/", $naam) || trim($naam) == '') {
        echo "De string bevat andere tekens dan alleen letters en spaties.";
        header("Location: index.php");
    }
    $email = cleaningAndValidateEmail($_POST['email']);
    $bericht = cleaningData($_POST['bericht']);
    if (empty($email)) {
        echo "Het opgegeven e-mailadres is niet geldig.";
        exit();
        header("Location: index.php");
    } else if (empty($naam)) {
        echo "Er klopt iets niet met jouw naam, houd er rekening mee dat hij groter dan 2 en kleiner dan 50 tekens moet zijn";
        exit();
        header("Location: index.php");
    } else if (empty($bericht) || strlen($bericht < 2)) {
        echo "Controleer uw bericht, het bericht mag niet kleiner zijn dan 2 tekens.";
        exit();
    }

    try {
        $query = 'INSERT INTO Berichten (
            naam,
            email,
            bericht
            ) VALUES (
            :naam,
            :email,
            :bericht
            )';
            $stmt = $pdo->prepare($query);
            $data = [
                'naam' => $naam,
                'email' => $email,
                'bericht' => $bericht
            ];
            $query_execute = $stmt->execute($data);
            if ($query_execute) {
                header('Location:succes.php');
                echo "Thank you for your message, we will be in contact with you :D";
                echo "Bedankt voor uw bericht, we zullen in contact komen met u :D";
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