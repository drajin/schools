<?php

require('bootstrap.php');

//    if(isset($_GET['id'])){
//        $id = $_GET['id'];
//        $mysqli->query("DELETE FROM schools WHERE id=$id") or die($mysqli->error());
//    }


if(isset($_POST['post_sub_btn'])){
    echo 'get';
    $id = $_GET['id'];
    $name = $_POST['name'];
    $schools->update($name, $id);
    $_SESSION['message'] = 'School updejted!';
    $_SESSION['msg_type'] = 'success';
    redirect_to('index.php');
}

