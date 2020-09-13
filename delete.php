<?php

require('bootstrap.php');

//    if(isset($_GET['id'])){
//        $id = $_GET['id'];
//        $mysqli->query("DELETE FROM schools WHERE id=$id") or die($mysqli->error());
//    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $schools->delete('schools', $id);
        $_SESSION['message'] = 'School deleted!';
        $_SESSION['msg_type'] = 'danger';
        redirect_to('index.php');
    }

