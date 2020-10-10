<?php

require('../../config/bootstrap.php');

// Korisno
//if($_SERVER['REQUEST_METHOD'] == 'GET') {
//    redirect_to('index.php');
//}

if(!isset($_GET['id'])) {
    redirect_to('index.php');
} else {
    $id = $_GET['id'];
    $school = $schools->find_by_id('schools', $id);
}

//if(isset($_GET['id'])){
//    $id = $_GET['id'];
//    $school = $schools->find_by_id('schools', $id);
//} else {
//    redirect_to('index.php');
//}


if(isset($_POST['post_sub_btn'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $schools->update($name, $id);
    $_SESSION['message'] = 'School updejted!';
    $_SESSION['msg_type'] = 'success';
    redirect_to('index.php');
}

?>

<?php $page_title = 'Edit School Board'; ?>


<?php include('../includes/admin_header.php');  ?>

    <h4>Edit School</h4>
</div>
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <form action="edit.php?id=<?= $school->id ?>" method="post">
                <input type="text" name="name" value="<?= $school->school_name ?>" class="form-control" placeholder="School Name"><br>
                <button type="submit" name="post_sub_btn" class="form-control btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</div>


<?php include('../includes/admin_footer.php');  ?>
