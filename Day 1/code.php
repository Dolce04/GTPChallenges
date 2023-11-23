<?php
include_once("db.inc.php");
include_once("functions.php");

if (isset($_POST['submit_button'])) {
    $naam = cleaningData($_POST['naam']);
    $email = cleaningAndValidateEmail($_POST['email']);
    if (!$email) {
        // Als de e-mail niet geldig is, toon dan een foutbericht en stop de scriptuitvoering
        echo "Het opgegeven e-mailadres is niet geldig.";
        exit;
    }
    $bericht = cleaningData($_POST['bericht']);

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
}