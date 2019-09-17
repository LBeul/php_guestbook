# Use this file to create tables so we use the same data 


# Initialize user database
CREATE TABLE guestbookUser (
	firstName VARCHAR(256),
	lastName VARCHAR(256),
	userEmail VARCHAR(256),
	userEntryKey VARCHAR(256),
	passwort VARCHAR(256)
)
;

# Initalize entry database
CREATE TABLE guestbookEntry (
	entry LONGTEXT,
	userEntryKey VARCHAR(256), 
	entryDate DATE,
	ID VARCHAR(256)
)
;

# Testing data 
INSERT INTO guestbookUser 
VALUES (
"Laura", 
"Herring", 
"Laura.Herring@somemail.com", 
"LauraHerringBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Anna", 
"Jung", 
"Anna.Jung@somemail.com", 
"AnnaJungBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Sara", 
"Froehlich", 
"Sara.Froehlich@somemail.com", 
"SaraFroehlichBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Louis", 
"Beul", 
"Louis.Beul@somemail.com", 
"LouisBeulBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Bartosz", 
"Burgiel", 
"Bartosz.Burgiel@somemail.com", 
"BartoszBurgielBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Tim", 
"Zirfas", 
"Tim.Zirfas@somemail.com", 
"TimZirfasBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Kai", 
"Sturm", 
"Kai.Sturm@somemail.com", 
"KaiSturmBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Sara", 
"da Mata", 
"Sara.da Mata@somemail.com", 
"Sarada MataBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Katharina", 
"Napiontek", 
"Katharina.Napiontek@somemail.com", 
"KatharinaNapiontekBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Jarek", 
"Zielinski", 
"Jarek.Zielinski@somemail.com", 
"JarekZielinskiBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Anna", 
"Rangnau", 
"Anna.Rangnau@somemail.com", 
"AnnaRangnauBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Melisa", 
"Yomralioglu", 
"Melisa.Yomralioglu@somemail.com", 
"MelisaYomraliogluBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Christina", 
"Pfeifer", 
"Christina.Pfeifer@somemail.com", 
"ChristinaPfeiferBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Jana", 
"Meudt", 
"Jana.Meudt@somemail.com", 
"JanaMeudtBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Tim", 
"Heuzeroth", 
"Tim.Heuzeroth@somemail.com", 
"TimHeuzerothBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Esther", 
"Brauer", 
"Esther.Brauer@somemail.com", 
"EstherBrauerBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Johann", 
"Strueder", 
"Johann.Strueder@somemail.com", 
"JohannStruederBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Jason", 
"Arndt", 
"Jason.Arndt@somemail.com", 
"JasonArndtBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Clevie", 
"Mundele", 
"Clevie.Mundele@somemail.com", 
"ClevieMundeleBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Nikita", 
"Railan", 
"Nikita.Railan@somemail.com", 
"NikitaRailanBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Dana", 
"Voigtlaender", 
"Dana.Voigtlaender@somemail.com", 
"DanaVoigtlaenderBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Pauline", 
"Schall", 
"Pauline.Schall@somemail.com", 
"PaulineSchallBoi", 
"root" ) ;

INSERT INTO guestbookUser 
VALUES (
"Lorenz", 
"Kuehnel", 
"Lorenz.Kuehnel@somemail.com", 
"LorenzKuehnelBoi", 
"root" ) ;



INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"LauraHerringBoi",
"2019-09-06",
"1568739504921"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"AnnaJungBoi",
"2019-09-06",
"1568739505032"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"SaraFroehlichBoi",
"2019-09-06",
"1568739505102"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"LouisBeulBoi",
"2019-09-06",
"1568739505184"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"BartoszBurgielBoi",
"2019-09-06",
"1568739505288"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"TimZirfasBoi",
"2019-09-06",
"1568739505327"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"KaiSturmBoi",
"2019-09-06",
"1568739505372"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"Sarada MataBoi",
"2019-09-06",
"1568739505433"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"KatharinaNapiontekBoi",
"2019-09-06",
"1568739505509"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"JarekZielinskiBoi",
"2019-09-06",
"1568739505530"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"AnnaRangnauBoi",
"2019-09-06",
"1568739505646"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"MelisaYomraliogluBoi",
"2019-09-06",
"1568739505678"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"ChristinaPfeiferBoi",
"2019-09-06",
"1568739505760"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"JanaMeudtBoi",
"2019-09-06",
"1568739505870"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"TimHeuzerothBoi",
"2019-09-06",
"1568739505919"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"EstherBrauerBoi",
"2019-09-06",
"1568739506013"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"JohannStruederBoi",
"2019-09-06",
"1568739506045"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"JasonArndtBoi",
"2019-09-06",
"1568739506114"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"ClevieMundeleBoi",
"2019-09-06",
"1568739506171"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"NikitaRailanBoi",
"2019-09-06",
"1568739506198"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"DanaVoigtlaenderBoi",
"2019-09-06",
"1568739506313"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"PaulineSchallBoi",
"2019-09-06",
"1568739506404"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"LorenzKuehnelBoi",
"2019-09-06",
"1568739506453"
) ;

