<?php



$config = require_once('config.php');

require_once '../../classes/Connection.php';
require_once '../../classes/DatabaseObject.php';
require_once '../../classes/School.php';
require_once '../../classes/Student.php';
require_once '../../classes/Grade.php';

require_once '../../functions.php';

session_start();

$db = Connection::connect($config['database']);


$query = new DatabaseObject($db);
$schools = new School($db);
$students = new Student($db);
$grades = new Grade($db);
