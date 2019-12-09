/*
SQL file for constructing and inserting data to the database
Deliverable 1
*/
DROP TABLE IF EXISTS records;

CREATE TABLE records(
	record_id INT PRIMARY KEY,
	student_id INT NOT NULL,
	name VARCHAR(25) NOT NULL,
    gned SMALLINT NOT NULL,
    itce SMALLINT NOT NULL,
    netd SMALLINT NOT NULL,
    oop SMALLINT NOT NULL,
    syde SMALLINT NOT NULL,
    sysa SMALLINT NOT NULL,
    webd SMALLINT NOT NULL,
    gpa NUMERIC (3,2) NOT NULL,
    comments VARCHAR(50)

);



insert into records(record_id,student_id,name,gned,itce,netd,oop,syde,sysa,webd,gpa,comments ) VALUES(
	1,
	100456789,
	'Test',
    50,
    50,
    50,
    50,
    50,
    50,
    50,
    2.5,
    'Nothing Special'
    );
	