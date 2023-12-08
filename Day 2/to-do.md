# Challenge Dag 2 - Contactformulier Verfijnen

## Doel
Verbeter de functionaliteit, veiligheid, en gebruikerservaring van het contactformulier dat je op Dag 1 hebt gemaakt.

## Takenlijst

### Stap 1: Formulier Validatie Versterken
- [V] Voeg server-side e-mailvalidatie toe in `code.php`.
  - Gebruik `filter_var` met `FILTER_VALIDATE_EMAIL` voor e-mailvalidatie.
- [?] Implementeer aanvullende validatie voor andere velden indien nodig.

### Stap 2: Verbeteren van Gebruikersfeedback
- [V] Voeg foutmeldingen toe voor ongeldige invoer in `code.php`.
- [V] Zorg ervoor dat gebruikers terug kunnen gaan naar het formulier om fouten te corrigeren. // foutmelding moet nog worden toegevoegd.

### Stap 3: CSS Verbeteringen voor Toegankelijkheid
- [V] Voeg `:focus` pseudo-klasse toe in `style.css` voor betere toetsenbordnavigatie.
  - Focus op inputvelden en tekstgebieden.
- [V] Controleer contrast en leesbaarheid van teksten en achtergronden.

### Stap 4: Beveiligingsverbeteringen
- [V] Controleer of `htmlspecialchars` op de juiste manier wordt gebruikt in `functions.php`.
- [V] Overweeg het gebruik van Content Security Policy (CSP) in de HTML-header voor extra beveiliging.

### Stap 5: Code Review en Refactoring
- [V] Herzie alle PHP- en HTML-bestanden voor consistentie en netheid.
- [V] Refactor code waar nodig voor betere leesbaarheid en onderhoudbaarheid.

### Stap 6: Testen en Debuggen
- [V] Test het formulier grondig met verschillende invoer.
- [V] Los eventuele bugs of problemen op die je tegenkomt.

## Afronding
- [V] Controleer of alle functionaliteiten naar behoren werken.
- [V] Vraag feedback van een peer of mentor over je project.
