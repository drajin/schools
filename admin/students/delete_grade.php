<?php

require('../../config/bootstrap.php');

    $id = $_GET['id'];
    $student_id = $_GET['student_id'];

    $result = $grades->delete('grades', $id);

    if($result === true) {
        echo 'ok';
        $_SESSION['message'] = 'Grade deleted!';
        $_SESSION['msg_type'] = 'danger';
      redirect_to('/phpskolica/admin/students/grades.php?id='. $student_id . '');
    } else {
        echo 'nece';
        echo $id;
        var_dump($result);
    }
