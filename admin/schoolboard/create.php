<?php

require('../../config/bootstrap.php');



if (isset($_POST['post_sub_btn'])) {
    $result = $schools->create();
        if($result === true) {
            $_SESSION['message'] = 'School Added!';
            $_SESSION['msg_type'] = 'success';
            redirect_to('index.php');
    } else {
            // show errors
        }



}

require('../../views/admin/schoolboard/create.view.php');