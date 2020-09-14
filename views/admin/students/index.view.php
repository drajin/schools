<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP Skolica</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
<?php include('massages.php');  ?>
<div class="container">

    <br>

    <table class="table">
        <thead class="thead-dark">
        <tr>

            <th scope="col">Name</th>
            <th scope="col">School Board</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($students as $student): ?>
            <tr>
                <th><?= $student->name ?></th>
                <?php if($student->school): //relaciona baza na redu ?>
                    <td><?= $student->school->school_board ?></td>
                <?php else : ?>
                    <td>--</td>
                <?php endif; ?>
                <td><a href="/admin/students/{{$student->id}}/show">View</a></td>
                <td><a href="/admin/students/{{$student->id}}/edit/">Edit Personal Information</a></td>
                <td><a href="/admin/students/{{$student->id}}/grades/">Edit Grades</a></td>
                <td><a href="/admin/students/{{$student->id}}/destroy">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <br>
    <a class="action" href="/admin/students/create">Add a new Student</a>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
</body>
</html>
