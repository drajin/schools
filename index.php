<?php

require('bootstrap.php');

//$todos = $query->select_all('todos', 'Todo');
//$todos[0]->done = 1;

    $schools = $query->select_all('schools');

require('views/index.view.php');



