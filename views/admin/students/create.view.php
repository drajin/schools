<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Student Area</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">

    <h4>Add a Student</h4>
</div>
<?= display_errors($student->errors) ?>
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
<!--            --><?php //if($schools->new_school_added): ?>
<!--                <div class="alert alert-success">School created!</div>-->
<!--            --><?php //endif ?>
            <form action="create.php" method="post">
                <input type="text" name="name" class="form-control" placeholder="School Name"><br>
                <button type="submit" name="post_sub_btn" class="form-control btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
</body>
</html>
