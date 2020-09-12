<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP Skolica</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<table class="table">
    <thead class="thead-dark">
    <tr>

        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col"></th>
        <th scope="col"></th>

    </tr>
    </thead>
    <tbody>

    <?php foreach($schools as $school): ?>
        <tr>
            <th scope="row"><?= $school->id; ?></th>
            <th scope="col"><?= $school->name; ?></th>
            <td scope="col"><a href="edit.php?id=<?= $school->id ?>">Edit</a></td>
            <td scope="col"><a href="delete.php?id=<?= $school->id ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>


    </tbody>
</table>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
</body>
</html>
