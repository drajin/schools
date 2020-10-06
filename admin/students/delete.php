<?php

require('../../config/bootstrap.php');

//    if(isset($_GET['id'])){
//        $id = $_GET['id'];
//        $mysqli->query("DELETE FROM schools WHERE id=$id") or die($mysqli->error());
//    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $students->delete('students', $id);
        $_SESSION['message'] = 'Student deleted!';
        $_SESSION['msg_type'] = 'danger';
        redirect_to('/phpskolica/admin/students/');
    }

