<?php

require('../../config/bootstrap.php');

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


if(isset($_POST['post_sub_btn'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $schools->update($name, $id);
    $_SESSION['message'] = 'School updejted!';
    $_SESSION['msg_type'] = 'success';
    redirect_to('index.php');
}





require('../../views/admin/schoolboard/edit.view.php');