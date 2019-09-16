# Use this file to create tables so we use the same data 


# Initialize user database
CREATE TABLE guestbookUser (
	firstName VARCHAR(256),
	lastName VARCHAR(256),
	userEmail VARCHAR(256),
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
	"datPolishBoiii"
)
;

INSERT INTO guestbookUser VALUES (
	"Louis",
	"Beul",
	"l.beul@outlook.de",
	"iLikeTurtles"
)
;

INSERT INTO guestbookUser VALUES (
	"Mickey",
	"Mouse",
	"mickey@mouse.com",
	"donaldsaBitch"
)
;

INSERT INTO guestbookEntry VALUES (
	"Heißt Sand eigentlich Sand, weil er zwischen See und Land liegt?",
	"datPolishBoiii",
	"2019-09-06 09:42:32",
	"1"
) 
;

INSERT INTO guestbookEntry VALUES (
	"Wenn du einmal zu klatschen anfängst, hörst du nie auf. Es ändert sich bloß der Intervall.",
	"iLikeTurtles",
	"2019-09-06 09:42:42",
	"2"
) 
;

INSERT INTO guestbookEntry VALUES (
	"Woher wussten die Menschen, die die Uhr erfunden, wie viel Uhr wir gerade hatten?",
	"donaldsaBitch",
	"2019-09-06 11:32:53",
	"3"
)
;

INSERT INTO guestbookEntry VALUES (
	"Ist das eine rhetorische Frage?",
	"datPolishBoiii",
	"2019-09-06 11:29:13",
	"4"
)
;

INSERT INTO guestbookEntry VALUES (
	"Bio ist für mich Abfall.",
	"iLikeTurtles",
	"2019-09-06 11:30:31",
	"5"
)
;

INSERT INTO guestbookEntry VALUES (
	"Wait, that's illegal.",
	"donaldsaBitch",
	"2019-09-06 11:34:42",
	"6"
)
;
