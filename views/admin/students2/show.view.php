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


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
</body>
</html>
