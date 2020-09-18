<?php

require('../../config/bootstrap.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    redirect_to('index.php');
}


$student = $students->find_student_by_id($id);

require('../../views/admin/students/show.view.php');



