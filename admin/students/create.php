<?php

require('../../config/bootstrap.php');

$schools = $schools->select_all('schools');


if (isset($_POST['post_sub_btn'])) {


    $result = $students->create();

    if($result === true) {
        $_SESSION['message'] = 'School Added!';
        $_SESSION['msg_type'] = 'success';
        redirect_to('index.php');
    } else {
        // show errors
    }

}

require('../../views/admin/students/create.view.php');