<?php

require('../../config/bootstrap.php');

//    if(isset($_GET['id'])){
//        $id = $_GET['id'];
//        $mysqli->query("DELETE FROM schools WHERE id=$id") or die($mysqli->error());
//    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $student_grades = $grades->find_by_student_id($id);
        foreach( $student_grades as $grade) {
            $students->delete('grades', $grade->id);
        }
        $students->delete('students', $id);
        $_SESSION['message'] = 'Student deleted!';
        $_SESSION['msg_type'] = 'danger';
        redirect_to('/phpskolica/admin/students/');



    }

