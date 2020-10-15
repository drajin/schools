<?php

require('../../config/bootstrap.php');



if (isset($_POST['post_sub_btn'])) {
    $result = $schools->create();
        if($result === true) {
            $_SESSION['message'] = 'School Added!';
            $_SESSION['msg_type'] = 'success';
            redirect_to('index.php');
    } else {
            // show errors
        }



}

?>
<?php $page_title = 'Add new School Board'; ?>


<?php include('../includes/admin_header.php');  ?>

    <h4>Add New School</h4>
</div>

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
<!--            --><?php //if($schools->new_school_added): ?>
<!--                <div class="alert alert-success">School created!</div>-->
<!--            --><?php //endif ?>
            <?= display_errors($schools->errors) ?>
            <form action="create.php" method="post">
                <input type="text" name="name" class="form-control" placeholder="School Name"><br>
                <button type="submit" name="post_sub_btn" class="form-control btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
</div>

<?php include('../includes/admin_footer.php');  ?>