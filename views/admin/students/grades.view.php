<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Students Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>


<body>

<div class="container">
    <?php include('massages.php');  ?>

<a href="index.php">&laquo; Back to List</a>
<div class="student show">
    <div class="attributes">
        <dl>
            <dt>Student:</dt>
            <dd><?= $student->name ?></dd>
        </dl>
        <dl>
            <dt>School board:</dt>
            <dd><?= $student->school_name; ?></dd>
        </dl>
    </div>
</div>

<h3>Grades:</h3>

<?php if( $students_grades == false){?>
    No grades yet
    <?php } else { ?>
    <?php foreach($students_grades as $grade): ?>
    <div class="form-group row">
        <label for="subject" class="col-sm-2 col-form-label"><?= $grade->subject ?></label>

        <div class="col-sm-10">
            <label for="grade" class="col-sm-2 col-form-label"><?= $grade->grade ?></label>
            <a href="delete_grade.php?id=<?= $grade->id ?>&student_id=<?= $id ?>">Delete Grade</a>
        </div>
    </div>
    <?php endforeach; ?>
    <?php } ?>
<?php //endforeach; ?>
<br>
<br>
<h5>Add a Grade</h5>

<form method="POST" action="">
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Subject" name="subject" value="">
        </div>
        <div class="col">
            <select class="form-control custom-select {{$errors->has('grades') ? 'is-invalid' : ''}} " name="grade">
               <?php foreach($grades::GRADES as $grade):?>
                <option value="<?= $grade; ?>"
                    <?php //mesto za IF ?>
                ><?= $grade; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <input type="hidden" name="student_id" value="<?= $id; ?>"/>

    <br>
    <button type="submit" class="btn btn-primary my-1" name="post_sub_btn">Submit</button>

</form>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
</body>
</html>