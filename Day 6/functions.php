<?php
include_once("db.inc.php");

//defined error log constants that directs to the error.txt files. need to make a function for this later.
define('LOG_FILE_DB', '../../logs/logs_GPTchallenge/Day 6/db.error.txt');
define('LOG_FILE_ERROR', "../../logs/logs_GPTchallenge/Day 6/error.txt");

/* functions info:
htmlspecialchars weerhoud Cros-site scripting (XSS), 
XSS is een veelvoorkomende kwetsbaarheid in webapplicaties 
waarmee aanvallers schadelijke scripts kunnen injecteren in webpagina's.
Men kan hier o.a. cookies, tokens of andere informatie van de gebruiker mee stelen.

ucfirst:
Hier wordt de eerste letter van de string omgezet naar hoofdletter.
Dit zorgt voor meer netheid in de database.

str_replace:
Is een functie die één of meerdere waarde kan vervangen voor een andere waarde, 
bijv om te voorkomen dat men verkeerde input geeft.

trim:
trim zorgt ervoor dat er aan het begin en einde van de string de spaties worden verwijderd.
*/


//Simple cleaning function, sanitizes input from specialchars and trims both before and after from spaces.
function cleaningData($data)
{
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}
//Cleaning input data, make first letter capital and replace _ characters with spaces + both before and after will be trimmed from spaces.
function cleaningDataSpecial($data)
{
    $data = htmlspecialchars($data);
    $data = ucfirst($data);
    $data = str_replace("_", " ", $data);
    $data = trim($data);
    return $data;
}
//Sanitize and validate email. if return false, error message will be shown.
function cleaningAndValidateEmail($data)
{
    $data = filter_var($data, FILTER_SANITIZE_EMAIL);
        if (filter_var($data,FILTER_VALIDATE_EMAIL)) {
            $data = htmlspecialchars($data);
            return $data;
        } else {
            return false;
        }
}

/* dashboard.php functions: */

// PDO retrieved from db.inc.php. output the DBdata from $query request in an array in $resultSet.
function retrieveAllMsg ($pdo, $query)
{
    try{
    $query = "SELECT * FROM Berichten";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $resultSet = $stmt->fetchALL(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
    file_put_contents(LOG_FILE_DB, $err->getMessage() . PHP_EOL, FILE_APPEND);
    } catch (Exception $err) {
    file_put_contents(LOG_FILE_ERROR, $err->getMessage() . PHP_EOL, FILE_APPEND);
    }
    return $resultSet;
}


/* detail.php functions: */

//Get id from clicked button, put id in variable and bind variable in query, receive all information from the id. error log is done by loggin.
function receiveIdQuery ($pdo, $id)
{
    try {
        $query = "SELECT * FROM Berichten WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultSet = $stmt->fetch();
        if ($resultSet['status'] === "unseen") {
            valueCheck($pdo, $resultSet);
        }
    } catch (PDOException $err) {
    file_put_contents(LOG_FILE_DB, $err->getMessage() . PHP_EOL, FILE_APPEND);
    } catch (EXception $err) {
    file_put_contents(LOG_FILE_ERROR, $err->getMessage() . PHP_EOL, FILE_APPEND);
    }
    return $resultSet;
}

function valueCheck($pdo, $resultSet){
        $id = $resultSet['id'];
        $status = "seen";

        try {
            $query = "UPDATE Berichten SET
            status=:status
            WHERE id=:id";

            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':status', $status);
            $stmt->execute();
            $resultSet['status'] = "seen";
        } catch (PDOException $err) {
            file_put_contents(LOG_FILE_DB, $err->getMessage() . PHP_EOL, FILE_APPEND);
            } catch (EXception $err) {
            file_put_contents(LOG_FILE_ERROR, $err->getMessage() . PHP_EOL, FILE_APPEND);
            }
        return $resultSet;

}