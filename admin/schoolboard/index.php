<?php

require('../../config/bootstrap.php');



    $schools = $query->select_all('schools');

require('../../views/admin/schoolboard/index.view.php');



