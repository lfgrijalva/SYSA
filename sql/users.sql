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
	'jdoe', md5('password'), 123,
	'mmigliore', md5('schoolpass'), 234,
	'kromero', md5('testpass'), 345,
	'lgrijalva', md5('aihub'), 456,
	'rsmith', md5('something'), 567,
	'adoe', md5('camping'), 678,
	'tsegovia', md5('classroom'), 789,
	'dpuff', md5('towel22'), 987,
	'jmoncada', md5('metro'), 876,
	'gmigliore', md5('train'), 765
	
	);
	