<?php

require('../../config/bootstrap.php');

$schools = $schools->select_all('schools');


if (isset($_POST['post_sub_btn'])) {


    $result = $students->create();

    if($result === true) {
        $_SESSION['message'] = 'Student Added!';
        $_SESSION['msg_type'] = 'success';
        redirect_to('index.php');
    } else {
        // show errors
    }

}

?>

<?php $page_title = 'Add a new Student Information'; ?>


<?php include('../includes/admin_header.php');  ?>



        <a href="index.php">&laquo; Back to List</a>
        <h3>Add a Student:</h3>
    <?= display_errors($students->errors) ?>
    <form  action="create.php" method="POST">

        <div class="form-group row">
            <label for="Name" class="col-sm-2 col-form-label">Add a Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Name" name="name" placeholder="Full name">
            </div>
        </div>

        <div class="form-group row">
            <label for="school_board" class="col-sm-2 col-form-label">School Board:</label>
            <div class="col-sm-10">
                <select class="form-control custom-select " name="school_id">
<!--                    --><?php //foreach($schools as $school): ?>
<!--                        <option value="--><?//= $school->id ?><!--"-->
<!--                            --><?php // echo '--'; {echo "selected";} ?>
<!--                        >--><?//= $school->school_name ?><!--</option>-->
<!--                    --><?php //endforeach; ?>
                    <option value=0 > -- </option>
                    <?php foreach($schools as $school): ?>
                    <option value="<?= $school->id ?>"><?= $school->school_name ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>


        <button type="submit" name="post_sub_btn" class="btn btn-primary my-1">Submit</button>

    </form>



    <?php include('../includes/admin_footer.php');  ?>
