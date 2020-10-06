<?php

require('../../config/bootstrap.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;
} else {
    redirect_to('index.php');
}


$student = $students->find_student_by_id($id);
$grades = $grades->find_by_student_id($student->id);

require('../../views/admin/students/show.view.php');



