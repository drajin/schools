<?php

require('../../config/bootstrap.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    redirect_to('index.php');
}


$student = $students->find_student_by_id($id);
$grades = $grades->find_by_student_id($student->id);

?>


<?php $page_title = 'Student details'; ?>


<?php include('../includes/admin_header.php');  ?>


<?php include('../includes/massages.php');  ?>

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

<?php include('../includes/admin_footer.php');  ?>




