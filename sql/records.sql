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
	1, 100456789, 'test', 50, 50, 50, 50, 50, 50, 50, 2.50, 'Nothing Special',
    2, 100362514, 'Mathew Migliore', 55, 66, 77, 88, 99, 22, 33, 2.43, 'Could have done better',
    1, 100456789, 'John Doe', 45, 55, 65, 75, 85, 95, 100, 3.00, 'Nothing Special',
    3, 100695847, 'Kevin Romero', 60, 70, 80, 85, 86, 87, 90, 3.93, 'Did well',
    4, 100369857, 'Luis Grijalva', 22, 32, 52, 62, 72, 82, 92, 2.21, 'Teacher was not good on first course',
    5, 100321456, 'Ryan Smith', 63, 66, 69, 72, 75, 78, 81, 3.00, 'Average grades',
    6, 100695871, 'Anthony Doe', 84, 87, 90, 93, 96, 99, 100, 4.79, 'Tried hard this semester',
    7, 10362495, 'Tristan Segovia', 52, 64, 76, 88, 55, 57, 59, 2.21, 'I need to study more',
    8, 100214785, 'Darren Puff', 60, 61, 62, 63, 64, 65, 66, 2.14, 'I need to go to class more',
    9, 100369854, 'Joe Moncada', 71, 72, 73, 74, 75, 76, 77, 3.21, 'Semester was alright',
    10, 100589454, 'Grace Migliore', 81, 83, 51, 53, 90, 50, 65, 2.64, 'I understand some classes much better than others'
    );
	