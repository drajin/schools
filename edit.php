<?php

require('bootstrap.php');

// Korisno
//if($_SERVER['REQUEST_METHOD'] == 'GET') {
//    redirect_to('index.php');
//}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $school = $schools->find_by_id('schools', $id);
} else {
    redirect_to('index.php');
}



//if (isset($_POST['post_sub_btn'])) {
//    $school->update();
//    redirect_to('index.php');
//
//}



require('views/edit.view.php');