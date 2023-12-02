<!-- PHP -->

*/ Logging

wat is logging: Logging bied je de mogelijkheid om errors ipv naar de gebruiker te tonen, op te slaan in een bestand waar er naar gekeken kan worden door de mensen die er verstand van hebben.

Het is beter om logging te gebruiken dan foutmeldingen te echoën. (vooral voor long-term en onderhoud van software. je kunt met logging zoveel kanten op.).

Veiligheid:
De mogelijkheid bestaat dat er bij het echoën van foutmeldingen informatie naar de gebruiker gaat die voor hen niet relevant zijn, zoals: bestandspaden, database informatie of andere technische informatie.
Hier kan een gebruiker wellicht iets kwaadwillends mee aanrichten. met Logging blijft dit alleen beschikbaar voor de ontwikkelaar of systeembeheerders.

Volledigheid:
Er zit veel meer informatie in een log dan er zich in een echo bevind. Wat nuttige informatie is bij het debuggen en cruciaal kan zijn voor effectieve probleem oplossing.

Niet-Storend: 
Foutmeldingen aan de gebruiker tonen in de gebruikersinterface kan de gebruiker als storen zien.
Om de gebruikerservaring zo hoog en soepel mogelijk te houden, bied loggen je de mogelijkheid de problemen te monitoren, analyseren en enventueel op te lossen zonder bijkomstigheid en inpact op de gebruiker.

Historish overzicht:
Logs bieden de mogelijkheid om ver terug in de tijd te gaan, zo kunnen bepaalde zaken later opspelen en mogelijke problemen worden begrepen, opgespoord en opgelost.

Analyse en Monitoring:
Loggen stelt je in staat geavanceerde analyse en monitoringstools toe te passen om trends te identificeren, prestatieproblemen op te sporen of zelfs automatisch waarschuwingen in te stellen voor bepaalde soorten fouten.

Asynchroon Debuggen:
Logs stellen je in staat om terug te kunnen kijken bij een probleem dat zich heeft voorgedaan zonder dat je het perse hoeft te reproduceren, soms lukt of kan dit namelijk niet.
middels de logs kun je terugkijken naar wat er gebeurde zonder dat je het probleem zelf hoeft te veroorzaken.

Professionele Standaard:
Loggen is een professionele standaard in softwareontwikkeling, het toont een volwassenheid van de software en benadering in softwareonderhoud en foutopsporing.

Conclusie:
Loggen houd de gebruikerservaring hoog en bied daarnaast vrijwel alle mogelijkheden iets op te sporen, op te lossen of te monitoren. Loggen is de standaard in softwareontwikkeling en bied enorme efficientie in foutoplossing.

Code:
Maak een variabele die de bestandslocatie van het log bestand vertegenwoordigd. voorbeeld: ($logFile = '../../logs/jouwlogbestand.log';).
Gebruik een nieuwe variabele waarin de error wordt opgeslagen, dit hoeft niet perse, want je kan ook de variabele gebruiken in een try catch error die de get->Message(); vertegenwoordigd.
file_put_contents($logFileDB, $err->getMessage() . PHP_EOL, FILE_APPEND);: Deze regel logt de foutboodschap van de exception naar een logbestand.
$logFileDB vertegenwoordigd het pad naar het logbeestand.
$err->getMessage() haalt in dit voorbeeld de foutboodschap op uit het exception object, je kunt er ook een losse $variabele van maken die de error_log vertegenwoordigd.
PHP_EOL wordt toegevoegd om ervoor te zorgen dat elke foutmelding op een nieuwe regel in het logbestand komt.
FILE_APPEND is de vlag die ervoor zorgt dat elke nieuwe foutmelding wordt toegevoegd aan het einde van het bestand, in plaats van het bestaande inhoud te overschrijven.

/* 

*/ Security: 

Verplaats database credentials naar een locatie buiten de webroot folder, dit om te voorkomen dat eventuele credentials onbedoeld zichtbaar zijn.

Een best practice is om het in een config.php te zetten. 

Om de config.php te benaderen moet het pad naar de config.php in een include_once of require_once gezet worden. Deze zetten we in de db.inc.php

In de config.php configureer je de DB credentials middels de define() functie, de define() definieerd de constante.
*! We gebruiken hier de define() functie omdat deze overal in het script benaderbaar is, je complexere uitdrukkigen en functies als waarde kunt gebruiken, terwijl const alleen statische waarden toestaat en const kan niet binnen een function of method worden gebruikt. + define() geeft de mogelijkheid om een constante case-sensitive te maken waarde de constante waarde in een const altijd case-sensitive zijn.* 
De define() wordt als volgt gedefinieerd:
define('DB_HOST', 'localhost'); enzovoort.
define('NAAM_VAN_CONTANTE', 'waarde');

We gebruiken daarna de gedefinieerde constanten in de pdo variabele om de waardes op te halen en de connectie te leggen.
dit ziet er zo uit:

$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);

Hier is wat er gebeurt:

*! "mysql:host=": Dit is een string die het begin vormt van de Data Source Name (DSN) die nodig is om een verbinding met de MySQL-database op te zetten.
.: Deze punt wordt gebruikt om de string "mysql:host=" te verbinden met de waarde van de constante DB_HOST.
DB_HOST: Dit is de constante die de hostname van je database bevat, zoals gedefinieerd door define('DB_HOST', 'localhost');. Het kan 'localhost' zijn of een andere hostnaam.
";dbname=": Na de hostname voeg je deze string toe om het deel van de DSN te vormen dat de databasenaam specificeert.
. en DB_NAME: Opnieuw gebruik je een punt om de string te verbinden met de waarde van de constante DB_NAME, die de naam van je database bevat.*