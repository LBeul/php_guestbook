# Use this file to create tables so we use the same data 


# Initialize user database
CREATE TABLE guestbookUser (
	firstName VARCHAR(256),
	lastName VARCHAR(256),
	userEmail VARCHAR(256),
	password  VARCHAR(256),
	userEntryKey VARCHAR(256)
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
INSERT INTO guestbookUser VALUES (
	"Bartosz",
	"Burgiel",
	"bartek.burgiel@hotmail.com",
	"root",
	"123test"
)
;

INSERT INTO guestbookUser VALUES (
	"Louis",
	"Beul",
	"l.beul@outlook.de",
	"root",
	"321tset"
)
;

INSERT INTO guestbookEntry VALUES (
	"Bestes Gästebuch der Welt!",
	"123test",
	"2019-09-06 09:42:32",
	"1"
) 
;

INSERT INTO guestbookEntry VALUES (
	"Das Gästebuch ist echt der hammer!",
	"321tset",
	"2019-09-06 09:42:42",
	"2"
) 
;

INSERT INTO guestbookEntry VALUES (
	"Das Gästebuch funktioniert wirklich einwandfrei!",
	"321tset",
	"2019-09-06 11:32:53",
	"3"
)
;

INSERT INTO guestbookEntry VALUES (
	"Kann nur empfehlen 10/10",
	"123test",
	"2019-09-06 11:29:13",
	"4"
)
;

INSERT INTO guestbookEntry VALUES (
	"Ich nutze den Physikunterricht produktiv aus",
	"123test",
	"2019-09-06 11:30:31",
	"5"
)
;

INSERT INTO guestbookEntry VALUES (
	"Daniel sitzt neben mir und Katharina trägt vor",
	"123test",
	"2019-09-06 11:34:42",
	"6"
)
;
