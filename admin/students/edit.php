<?php

require('../../config/bootstrap.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    redirect_to('index.php');
}



$schools = $schools->select_all('schools');

$student = $students->find_student_by_id($id);

if(isset($_POST['post_sub_btn'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $school_id = $_POST['school_id'];
    $result = $students->update($name, $school_id, $id);

    if($result === true) {
        $_SESSION['message'] = 'Student updejted!';
        $_SESSION['msg_type'] = 'success';
        redirect_to('index.php');
    } else {
        //show errors
    }
}


// Korisno
//if($_SERVER['REQUEST_METHOD'] == 'GET') {
//    redirect_to('index.php');
//}

//if(isset($_GET['id'])){
//    $id = $_GET['id'];
//    $school = $schools->find_by_id('schools', $id);
//} else {
//    redirect_to('index.php');
//}
//
//
//if(isset($_POST['post_sub_btn'])){
//    $id = $_GET['id'];
//    $name = $_POST['name'];
//    $schools->update($name, $id);
//    $_SESSION['message'] = 'School updejted!';
//    $_SESSION['msg_type'] = 'success';
//    redirect_to('index.php');
//}




?>

<?php $page_title = 'Edit Student'; ?>


<?php include('../includes/admin_header.php');  ?>

<?= display_errors($students->errors) ?>
    <form method="POST" action="">

        <a href="index.php">&laquo; Back to List</a>
        <h3>Personal Information:</h3>
        <div class="form-group row">
            <label for="Name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Name" name="name" value="<?= $student->name ?>">
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



    <?php include('../includes/admin_footer.php');  ?>

