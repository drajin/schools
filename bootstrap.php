<?php



// obrisi
//define("PRIVATE_PATH", dirname(__FILE__));
//define("PROJECT_PATH", dirname(PRIVATE_PATH));
//define("PUBLIC_PATH", PROJECT_PATH . '/');
//define("SHARED_PATH", PRIVATE_PATH . '/admin');
//
//$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 11;
//$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
//define("WWW_ROOT", $doc_root);
//

$config = require_once('config.php');

require_once 'classes/Connection.php';
require_once 'classes/DatabaseObject.php';
require_once 'classes/School.php';
require_once 'classes/Student.php';
require_once 'classes/Grade.php';

require_once 'functions.php';

session_start();

$db = Connection::connect($config['database']);


$query = new DatabaseObject($db);
$schools = new School($db);
$students = new Student($db);
$grades = new Grade($db);
