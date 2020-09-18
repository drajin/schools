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

    <form method="POST" action="">

        <a href="index.php">&laquo; Back to List</a>
        <h3>Personal Information:</h3>
        <div class="form-group row">
            <label for="Name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Name" name="name" value=<?= $student->name ?>>
            </div>
        </div>

        <div class="form-group row">
            <label for="school_board" class="col-sm-2 col-form-label">School Board:</label>
            <div class="col-sm-10">
                <select class="form-control custom-select " name="school_id">
                    <?php foreach($schools as $school): ?>
                        <option value="<?= $school->id ?>"
                        <?php if($student->school_id == $school->id) {echo "selected";} ?>
                        ><?= $school->school_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>


        <button type="submit" name="post_sub_btn" class="btn btn-primary my-1" value="edit">Update</button>

    </form>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
</body>
</html>
