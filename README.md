# Autors: D43-ReinisAnrijsDubovs
Kvalifikācijas darba nosaukums: Rezervācijas mājaslapa

Projekta apraksts
Šis ir projekts PIKC "Rīgas Valsts tehnikums" kvalifikācijas darba repozitorijam. Mājas lapa, kurā ir viens paragrāfs ar css formatējumu.
Kvalifikācijas darba uzdevums ir izveidot rezervācijas mājaslapu auto stiklu remontam vai nomaiņai un citām auto servisa opcijām. Ar šīš mājaslapas palīdzību klientam būs iespēja reģistrēties, kā arī ielogoties mājaslapā ar piekļuvi sava profila rediģēšanai un skatīšanai. Sistēma dod iespēju veikt rezervācijās piedāvātajās remonta opcijās. Lietotājs var arī nereģistrēties mājaslapā un pieteikt rezervāciju kā viesis. Ir izveidota administratora lapa, kurā administrators var pārlūkot lietotājus, veiktās rezervācijas un produktus, kā arī dzēst vai labot to datus. Administratoram ir tiesība arī pievienot kategorijas un darbnīcu adreses un rezervācijas, kā arī tās dzēst.
Kopumā rezervāciju veikšanas sistēmai ir jāizpilda vairākas funkcionalitātes.
1.	Administrators: 
•	vār pārlūkot lietotājus;
•	var iestatīt lietotājus par adminu un adminu par lietotāju;
•	var veikt rezervācijas pieteikšanu cita vietā;
•	var pārlūkot rezervācijas, dzēst tās vai mainīt rezervācijas datumu vai laiku;
•	var pievienot produkta kategorijas nosaukumu, kā arī tās dzēst;
•	var izveidot prdouktu, pievienojot to pie konkrētās kategorijas;
•	var pievienot jaunas dabrnīcu adreses, kā arī tās dzēst;
2.	Lietotājs: 
•	var veikt rezervācijas pietiekšanu;
•	var piekļūt pie sava profila un mainīt profila datus.
3.	Nereģistrēts lietotājs: 
•	(viesis) var veikt rezervācijas.


Izmantotās tehnoloģijas
Projektā tiek izmantots:

Bootsrap 5 beta 3
HTML
CSS
PHP
phpMyAdmin
MySQL
Visual Studios Code

Izmantotie avoti
•	Bootstrap ietvara dokumentācija - https://getbootstrap.com/docs/5.0/getting-started/download/
•	Wampserver 64 forums un downlods - https://www.wampserver.com/en/
•	PHP funkciju dokumentācija -  http://php.net/
•	Font Awesome vektorgrafikas ikonu dokumentācija. - https://fontawesome.com/

Uzstādīšanas instrukcijas
•	Lai lietotu git lejupielādējam Git for windows
•	Instalējam git.
•	Lejupielādējam WAMP, lai varētu izveidot webserveri.
•	Instalējam WAMP.
•	Pārliecinamies par WAMP darbību atverot adresi http://localhost
•	Dodamies uz WAMP atrašanās vietu parasti c:\wamp\www\reinis un izdzēšam tā saturu.
•	Veicam labo klikšķi un izvēlamies opciju "git bash here" un izpildam zemāk raksīto komandu.
•	git clone https://github.com/rvtprog-kvalifikacija-20/d43-MarisDanne-paraugaProjekts.git
•	Atveram adresi http://localhost/reinis/index.php
•	Tālāk dodieties uz addProducts.php failu un nomainiet produktu bilžu glabāšanas lokāciju lai bildes glabātos jūsu projekta failā uploads, šie dati nav jāmaina gadijumā ja •  •	jūs esat uzinstalējis wamp serveri tiaki uz c diska.
•	Ejiet uz db.php un Ievadiet savus datubāzes nosaukumu, usernameu, password un servername, ja jums vis sakrīt un nekas nav jāmaina tad neko nemainiet.
•	Ieejiet phpMyAdmin un izveidojiet datubāzi vejstikli un importējeit vejstikli_1 sql failu.
•	Tas vis, mājaslapai vajadzētu strādat.

