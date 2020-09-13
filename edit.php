<?php

require('bootstrap.php');

//if($_SERVER['REQUEST_METHOD'] == 'GET') {
//    redirect_to('index.php');
//}


$school = $schools->find_by_id('school', 1);

if (isset($_POST['post_sub_btn'])) {
    $school->update();
    redirect_to('index.php');

}



require('views/edit.view.php');