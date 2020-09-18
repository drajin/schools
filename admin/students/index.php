<?php

require('../../config/bootstrap.php');

$students = $students->find_all_students();

require('../../views/admin/students/index.view.php');