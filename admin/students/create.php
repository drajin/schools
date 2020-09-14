<?php

require('../../config/bootstrap.php');



if (isset($_POST['post_sub_btn'])) {
    $result = $students->create();
        if($result === true) {
            $_SESSION['message'] = 'Student Added!';
            $_SESSION['msg_type'] = 'success';
            redirect_to('index.php');
    } else {
            // show errors
        }



}

require('../../views/admin/students/create.view.php');