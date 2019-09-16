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
	entryDate TIMESTAMP,
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
"2019-09-06 11:30:0",
"1568662522815"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"AnnaJungBoi",
"2019-09-06 11:30:1",
"1568662522905"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"SaraFroehlichBoi",
"2019-09-06 11:30:2",
"1568662522953"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"LouisBeulBoi",
"2019-09-06 11:30:3",
"1568662523013"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"BartoszBurgielBoi",
"2019-09-06 11:30:4",
"1568662523097"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"TimZirfasBoi",
"2019-09-06 11:30:5",
"1568662523116"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"KaiSturmBoi",
"2019-09-06 11:30:6",
"1568662523142"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"Sarada MataBoi",
"2019-09-06 11:30:7",
"1568662523182"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"KatharinaNapiontekBoi",
"2019-09-06 11:30:8",
"1568662523239"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"JarekZielinskiBoi",
"2019-09-06 11:30:9",
"1568662523239"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"AnnaRangnauBoi",
"2019-09-06 11:30:10",
"1568662523335"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"MelisaYomraliogluBoi",
"2019-09-06 11:30:11",
"1568662523347"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"ChristinaPfeiferBoi",
"2019-09-06 11:30:12",
"1568662523410"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"JanaMeudtBoi",
"2019-09-06 11:30:13",
"1568662523503"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"TimHeuzerothBoi",
"2019-09-06 11:30:14",
"1568662523532"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"EstherBrauerBoi",
"2019-09-06 11:30:15",
"1568662523612"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"JohannStruederBoi",
"2019-09-06 11:30:16",
"1568662523623"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"JasonArndtBoi",
"2019-09-06 11:30:17",
"1568662523668"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"ClevieMundeleBoi",
"2019-09-06 11:30:18",
"1568662523706"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"NikitaRailanBoi",
"2019-09-06 11:30:19",
"1568662523712"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"DanaVoigtlaenderBoi",
"2019-09-06 11:30:20",
"1568662523810"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"PaulineSchallBoi",
"2019-09-06 11:30:21",
"1568662523880"
) ;

INSERT INTO guestbookEntry 
VALUES (
"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.",
"LorenzKuehnelBoi",
"2019-09-06 11:30:22",
"1568662523909"
) ;

