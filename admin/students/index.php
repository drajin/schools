<?php

require('../../config/bootstrap.php');



$students = $query->select_all('students');

require('../../views/admin/students/index.view.php');