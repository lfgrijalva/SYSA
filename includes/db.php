<?php

function db_connect() {
    $conn = pg_connect("host=".DB_HOST." port=".DB_PORT." dbname=".DB_NAME." user=".DB_USER." password=".DB_PASSWORD );
    return $conn;
}
$conn = db_connect();

$stmt1 = pg_prepare($conn, "user_register", "INSERT INTO users(login_id, password, security_code) VALUES ($1, $2, $3)");
$stmt1 = pg_prepare($conn, "user_login", 'SELECT *FROM users WHERE login_id = $1 AND password = $2 AND security_code = $3;');
$stmt10 = pg_prepare($conn, "record_create",'insert into records(record_id, student_id, name, gned, itce, netd, oop, syde, sysa, webd, gpa, comments )'.
                            'values($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12);');


function pg_presql($conn)
{
    pg_prepare($conn, "login_query", 'SELECT user_id, password
  FROM users WHERE user_id = $1 AND password = $2;');
}

function is_user_id($user_id)
{
    global $conn;
    $result = pg_query_params($conn, 'SELECT * FROM users WHERE login_id = $1 ', array($user_id));

    $records = pg_num_rows($result);

    if ($records == 0) {
        return false;
    } else if ($records == 1) {
        return true;
    }
}

function is_student_id($student_id)
{
    global $conn;
    $result = pg_query_params($conn, 'SELECT student_id FROM records WHERE student_id = $1 ', array($student_id));

    $records = pg_num_rows($result);

    if ($records == 0) {
        return false;
    } else if ($records == 1) {
        return true;
    }
}

?>
