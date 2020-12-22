README:

De webtoepassing is gepubliceerd op het domein => myles.digital
Ik maakte gebruik van 000webhost.com voor de hosting en Cloudflar.
De webtoepassing maakt gebruik van laravel8 en jetstream.

HTTPS:
    1) Indien er een http request naar myles.digital wordt gestuurd dan wordt er een 301 response gestuurd.
        Vervolgens zal er een 307 response verstuurd worden.
    2) Alle request worden over https verstuurd
    3) myles.digital krijgt een A+ score.
    4) myles.digital maakt gebruik van dns caa => letsencrypt.org
    5) elke response bevat een STS header
    6) Het domein maakt gebruik van HSTS
    
Registratie:
    1) De user kan een gebruikersnaam en wachtwoord ingeven. De gebruikersnaam is ook de email van de user.
    2) alle 'printable' ASCII karakters worden aanvaard in het wachtwoord.
    3) Het wachtwoord moet uit minstens 7  karakters bestaan.
    4) De user kan het wachtwoord plakken.
    5) De webtoepassing maakt gebruik van de HIBP api die wachtwoorden dat meer dan 300 keer als has been pwned markeert weigert.
    6) De user moet bij registratie een email adress opgeven en deze moet bevestigt worden door de user vooraleer deze toegang krijgt tot de webtoepassing.
    7) De webtoepassing maakt gebruik van Bcrypt met een salt om het wachtwoord op te slaan.

Aanmelden:
    1) Na een mislukte login poging moet de user 60 seconden wachten.
    2) Het is mogelijk om het wachtwoord te plakken.
    3) De user kan pas inloggen nadat hij aangetoond heeft dat hij het emailadres bezit.
    4) Na het aanmelden wordt de user ontvangen in een dashboard, zodat het duidelijk is dat hij ingelogd is.
    5) Na het aanmelden kan hij al zijn gegevens opvragen, wijzigen, verwijderen en downloaden.
    
Bescherming persoonlijke gegevens:
    1) De webtoepassing is conform met de privacy wetgeving.
    2) De User kan de Privacyverklaring ten alle tijden raadplegen.
    3) De webtoepassing maakt enkel gebruik van noodzakelijke cookies waar hij van op de hoogte wordt gesteld bij het aanmelden.
    4) De user kan zijn gegvens opvragen, aanpassen, wissen en downloaden in json formaat.
    5) Indien de user bezwaar heeft kan hij contact opzoeken, zoals vermeld in de privacy verklaring.

Verwerkingsregister:
    1) Contactgegegevens
        -bedrijfsnaam: Myles De Baerdemaeker
        -adress: Nijverheidskaai 170, 1070 Anderlecht
        -email: myles.de.baerdemaeker@student.ehb.be
    2) Categorie persoonsgegevens: naam, email en passwoord
    3) Categorie betrokkennen: users
    4) Grondslag voor verwerking: Toestemming
    5) Doel verwerking: administratie
    6) Locatie verwerker: binnen de EU
    7) Bewaartermijn: tot de user het account verwijderd
    8) Veiligheidsmaatregelen: Voorafgaande autorisatie en het encrypteren van data
    9) Categorie persoonsgegevens: digitaal;
    10) Verwerkingsactiviteiten van bijzondere persoonsgegevens: NVT 
    11) Datum aanmaken register: 18 december 2020
    
Maatregelen tegen courante aanvallen:
    1) De webtoepassing is beveiligd tegen de opgelijste courante aanvallen.
    2) Geheimen worden beveiligd
    3) er worden maatregellen getroven tegen typische web vulnerabilities.

Rest api:
    1) de api biedt alle CRUD operaties aan van het object product die bestaat uit een id, naam, prijs, code en een token.
    2) Elke options succesvolle response bevat de 3 opgelijste headers.
    3) De methods POST,GET,PUT,DELETE en OPTION zijn toegelaten met de origins https://myles.digital, http://127.0.0.1:8000, http://localhost:8000.
    4) Indien niet het juiste mediatype wordt meegegeven stuurt de resource een status code 406 terug.
    5) "application/json" wordt voor alle resources aangeboden.
    6) de api maakt gebruik van de opgelijste status code in de tabel van de slides.
    7) De api past ratelimiting toe. Elke users kan 60request na elkaar doen.
    8) De toegangscontrole gebeurt via een token met Bearer.
    9) Voor een oplijsting moet er geen token meegegeven worden.
    10) Er zijn 2 soorten gebruikers
        gebruiker1:
                    -kan eigen producten deleten
                    -kan producten aanmaken
                    -kan een specifiek product opvragen
                    -kan een product aanpassen 
        beheerder:
                    -kan alle producten deleten
                    -kan een specifiek product opvragen 
                    -kan producten aanpassen
    11) de toegangscontrole wordt op publieke toegangspunten afgedwongen.
    12) een user die ingelogd is kan api tokens creëren.
    13) Alle URL'S :    -https://myles.digital/api/products/read => toegankelijk voor iedereen
                        -https://myles.digital/api/products/read/id
                        -https://myles.digital/api/products/create
                        -https://myles.digital/api/products/create/id => 405
                        -https://myles.digital/api/products/update => 405
                        -https://myles.digital/api/products/update/id
                        -https://myles.digital/api/products/delete => 405
                        -https://myles.digital/api/products/delete/id

Toegangstokens:
    Gebruiker1:"Bearer IJONQezQkWJqBTPeysXxtCPEzzHKgNB0giOBGbUQ"
    Gebruiker2:"Bearer pVGUAZvVzRLNYLe42WoJF1YHjQGLhJtJVEj28YaZ"
    Beheerder:"Bearer 8CXLiOcOBksXvez2rYYozLVQ39ATjSlv0eQc40Re"    
    testGebruiker:"Bearer GWTl4czi2PZcvsroTkFDniAGspNdBw3yxxRP1bAd"
    testBeheerder:"Bearer QJ3aS9FvIibYHKlOxndZuzGLKL9FQabQ9Srd6JBo"


README van Laravel8:

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
"# WebApp" 
