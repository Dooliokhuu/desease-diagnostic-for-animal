<?php

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'haais';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$con->set_charset("utf8");

$query_a = "SELECT * FROM answer_id";
$query_q = "SELECT * FROM question_id ORDER BY question_extra ASC";
$query_u = "SELECT * FROM member";
$query_dt = "SELECT * FROM disease_type";
$query_symptoms = "SELECT * FROM symptoms";
$query_disease_name = "SELECT * FROM disease_name";


$counter = 0;
$max = 10;

define('DB_HOST', 'localhost');
define('DB_NAME', 'haais');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('PATH_LIB', __DIR__ . DIRECTORY_SEPARATOR);