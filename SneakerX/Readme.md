# SneakerX ✅

Maak de applicatie zo goed mogelijk na mits rekening te houden met volgende specificaties:

- Installeer de database (sneakerx.sql in een database met de naam sneakerx) ✅
- Plaats de connectiegegevens in de .env file ✅
- Maak gebruik van het MVC principe om de html pagina's om te vormen naar een dynamische website ✅
- Plaats je voornaam en naam in de footer ✅

## Startpagina: (index.html)

- Bouw de lijst van sneakers dynamisch op. ✅
- Toon de 20 populairste sneakers (meeste biedingen) !!

## Navigatie ✅

- Op iedere pagina staat een navigatie die opgebouwd wordt vanuit de database tabel 'brands' ✅
- Zorg ervoor dat als je klikt op een brand, de lijst wordt gefilterd ✅
- Maak gebruik van de slug
  Zorg dat de aangeklikte brand actief komt te staan in de navigatie ✅

## Zoeken ✅

- Zorg ervoor dat je kan zoeken naar sneakers via het zoekveld ✅

## Detailpagina: ✅

- Bouw de detailpagina dynamisch na zoals detail.html ✅
- Toon ook de biedingen op deze sneaker. ✅
- De biedingen moeten gesorteerd worden volgens het bod, hoogste bovenaan ✅

## Inloggen:

- Een gebruiker moet kunnen inloggen via login.html
- Eens ingelogd dan wordt dit bijgehouden tot de gebruiker klikt op de logout link.
- Let wel: de naam, logout en add knop moeten vervangen worden door een login knop indien de gebruiker niet is ingelogd.
- Wachtwoord voor de 3 eerste gebruikers is : secret
- De wachtwoorden zijn gecodeerd via de php functie password_hash met het PASSWORD_DEFAULT algoritme

## Sneaker toevoegen:

- Zorg ervoor dat een sneaker kan toegevoegd worden. ✅ (zie add.html)
- De sneaker moet gekoppeld worden aan de ingelogde gebruiker

# Databasemodel

Maak het database model van de database van de examenopdracht.

Pas hierbij het model zodanig aan dat:

een brand moet ook 'subbrands' hebben.
Dus bv Air Jordan zou dan een onderliggend brand zijn van Nike
er meerdere bestanden (files, video's of afbeeldingen) gekoppeld kunnen worden;
gebruikers chatberichten naar elkaar kunnen sturen.

# Puntenverdeling

| Pagina                                    | Score |
| ----------------------------------------- | ----- |
| Startpagina sneakers overzicht            | 10    |
| Navigatie                                 | 10    |
| Filtering van overzicht volgens navigatie | 10    |
| Zoeken                                    | 10    |
| Detail van de sneaker                     | 10    |
| Bod plaatsen bij de sneaker               | 10    |
| Login/Logout                              | 10    |
| sneaker toevoegen                         | 10    |
| PHP Code (bv Correct gebruik MVC)         | 10    |
| Databasemodel aanpassen                   | 10    |
