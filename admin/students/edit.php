<?php

require('../../config/bootstrap.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    redirect_to('index.php');
}

$schools = $schools->select_all('schools');

$student = $students->find_student_by_id($id);

if(isset($_POST['post_sub_btn'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $school_id = $_POST['school_id'];
    $students->update($name, $school_id, $id);
    $_SESSION['message'] = 'Student updejted!';
    $_SESSION['msg_type'] = 'success';
    redirect_to('index.php');
}

// Korisno
//if($_SERVER['REQUEST_METHOD'] == 'GET') {
//    redirect_to('index.php');
//}

//if(isset($_GET['id'])){
//    $id = $_GET['id'];
//    $school = $schools->find_by_id('schools', $id);
//} else {
//    redirect_to('index.php');
//}
//
//
//if(isset($_POST['post_sub_btn'])){
//    $id = $_GET['id'];
//    $name = $_POST['name'];
//    $schools->update($name, $id);
//    $_SESSION['message'] = 'School updejted!';
//    $_SESSION['msg_type'] = 'success';
//    redirect_to('index.php');
//}





require('../../views/admin/students/edit.view.php');