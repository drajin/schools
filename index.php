<?php require('bootstrap.php'); ?>
<?php

$all_students = $students->find_all_students();
$all_schools = $schools->select_all('schools');

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
    <h1>Welcome</h1>

    <p>Please select the School Board or a Student:</p>

    <ul>
        <?php foreach($all_schools as $school): ?>
        <li><a href="#"></a></li>
<!--        <li><a href='school_board.php?id=--><?php //echo $school->id ?><!--'>--><?//= $school->school_name;?><!--</a></li>-->
        <ul>
            <?php foreach($all_students as $student): ?>
            <?php if($student->school_id == $school->id): ?>
            <li><a href='student.php?id=<?php echo $student->id?>'><?= $student->name;?></a></li>
            <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <?php endforeach; ?>
    </ul>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
</body>
</html>