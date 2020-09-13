<?php

require('bootstrap.php');

if (isset($_POST['post_sub_btn'])) {
    $schools->create();
    $_SESSION['message'] = 'School Added!';
    $_SESSION['msg_type'] = 'success';
    redirect_to('index.php');


}



require('views/create.view.php');