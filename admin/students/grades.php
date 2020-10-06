<?php

require('../../config/bootstrap.php');

$id = $_GET['id'];


if(isset($_POST['student_id'])){
    $student_id = $_POST['student_id'];

}

$student = $students->find_student_by_id($id);
$students_grades = $grades->find_by_student_id($student->id);
$number_grades = count($students_grades);


//var_dump($student);

if (isset($_POST['post_sub_btn'])) {

    if($number_grades > 3) {
        $_SESSION['message'] = 'Student can have only 4 Grades!';
        $_SESSION['msg_type'] = 'danger';
        redirect_to('/phpskolica/admin/students/grades.php?id='. $student_id . '');
    } else {
        $result = $grades->create();

        if($result === true) {
            $_SESSION['message'] = 'Grade Added!';
            $_SESSION['msg_type'] = 'success';
            redirect_to('/phpskolica/admin/students/grades.php?id='. $student_id . '');
        } else {
            // show errors
        }
    }


}





require('../../views/admin/students/grades.view.php');