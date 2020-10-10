<?php

require('../../config/bootstrap.php');

$id = $_GET['id'];


if(isset($_POST['student_id'])){
    $student_id = $_POST['student_id'];

}

$student = $students->find_student_by_id($id);
$students_grades = $grades->find_by_student_id($student->id);
$number_grades = count($students_grades);


//var_dump($student);

if (isset($_POST['post_sub_btn'])) {

    if($number_grades > 3) {
        $_SESSION['message'] = 'Student can have only 4 Grades!';
        $_SESSION['msg_type'] = 'danger';
        redirect_to('/phpskolica/admin/students/grades.php?id='. $student_id . '');
    } else {
        $result = $grades->create();

        if($result === true) {
            $_SESSION['message'] = 'Grade Added!';
            $_SESSION['msg_type'] = 'success';
            redirect_to('/phpskolica/admin/students/grades.php?id='. $student_id . '');
        } else {
            // show errors
        }
    }


}

?>

<?php $page_title = 'Edit Students Grades'; ?>


<?php include('../includes/admin_header.php');  ?>


    <?php include('../includes/massages.php');  ?>

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




    <?php include('../includes/admin_footer.php');  ?>
