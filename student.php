
<?php require('bootstrap.php'); ?>


<?php


if(isset($_GET['id'])){
$id = $_GET['id'];
} else {
redirect_to('index.php');
}



$student = $students->find_student_by_id($id);
$grades = $grades->find_by_student_id($student->id);


$sum_grades = 0;
$count = 0;
$average = 0;
$grades_array = [];

$page_title = 'Student details';

foreach($grades as $grade) {
    $sum_grades+= $grade->grade;
    $grades_array[] += $grade->grade;
    $count++;

}
if(!$sum_grades == 0) {
    $average = $sum_grades/$count;
}

function csmb_calculation($grades_array) {
    if(count($grades_array) == 2) {
        sort($grades_array);
        array_shift($grades_array);
    }
    if($grades_array == null) {
        return 'Student doesen\'t have any grades yet';
    } elseif (max($grades_array) >= 8) {
        return 'PASSED';
    } else {
        return 'FAILED';

    }
}


function csm_calculation($average) {
    if($average >= 7) {
        return 'PASSED';
    } else {
        return 'FAILED';
    }
}










?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>School Board <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <br>





<br>



<a class="back-link" href="index.php">&laquo; Back to List</a>
<br>
<br>
<div class="student show">
    <div class="attributes">
        <dl>
            <dt>Name</dt>
            <dd><?= $student->name ?></dd>
        </dl>
        <dl>
            <dt>School board:</dt>
            <dd><?= $student->school_name ?></dd>
        </dl>
    </div>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Subject</th>
        <th scope="col">Grade</th>
    </tr>
    </thead>
    <tbody>
    <?php if( $grades == false){?>
        <p class="font-weight-bold">No grades yet</p>
    <?php } else { ?>
        <?php foreach($grades as $grade): ?>
            <tr>
                <th scope="row"><?= $grade->subject ?></th>
                <td scope="row"><?= $grade->grade ?></td>
            </tr>
        <?php endforeach; ?>
    <?php } ?>
    </tbody>
</table>


</div>

<p class="text-center">Student has average of <?php echo $average ?></p>

<p class="text-center">
    <?php

    if($student->school_name == 'CSM') {
    echo csm_calculation($average);

    } elseif($student->school_name   == 'CSMB') {
    echo csmb_calculation($grades_array);
    }

    ?>
</p>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
</body>
</html>