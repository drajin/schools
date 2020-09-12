<?php  

$config = require_once('config.php');

require_once 'classes/Connection.php';
require_once 'classes/QueryBuilder.php';

$db = Connection::connect($config['database']);


$query = new QueryBuilder($db);
