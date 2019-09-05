# initialize user database

CREATE TABLE guestbookUser (
	firstName VARCHAR(256),
	lastName VARCHAR(256),
	userEmail VARCHAR(256),
	password  VARCHAR(256),
	userEntryKey int
)