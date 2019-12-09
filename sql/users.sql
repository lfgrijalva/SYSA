/*
SQL file for constructing and inserting data to the database
Deliverable 1
*/
DROP TABLE IF EXISTS users;

CREATE TABLE users(
	login_id VARCHAR(15) PRIMARY KEY,
	password VARCHAR(32) NOT NULL,
	security_code SMALLINT NOT NULL
);

INSERT INTO users VALUES(
	'jdoe',
	md5('password'),
	123);
	