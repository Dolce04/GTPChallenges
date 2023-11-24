<?php

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


//function to clean data to output.
function cleaningDataSpecial($data)
{
    $data = htmlspecialchars($data);
    $data = ucfirst($data);
    $data = str_replace("_", " ", $data);
    $data = trim($data);
    return $data;
}

function cleaningData($data)
{
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}

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
