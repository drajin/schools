<?php

require('../../config/bootstrap.php');

$students = $students->find_all_students();

?>


<?php $page_title = 'Students'; ?>


<?php include('../includes/admin_header.php');  ?>


    <?php include('../includes/massages.php');  ?>

    <br>

    <table class="table">
        <thead class="thead-dark">
        <tr>

            <th scope="col">Name</th>
            <th scope="col">School Board</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach($students as $student): ?>
            <tr>
                <th><?= $student->name ?></th>
                <?php if($student->school_id != NULL): //relaciona baza na redu ?>
                    <?php  ?>
                    <td><?= $student->school_name; ?></td>
                <?php else : ?>
                    <td>--</td>
                <?php endif; ?>
                <td><a href="show.php?id=<?= $student->id ?>">View</a></td>
                <td><a href="edit.php?id=<?= $student->id ?>">Edit Personal Information</a></td>
                <td><a href="grades.php?id=<?= $student->id ?>">Edit Grades</a></td>
                <td><a href="delete.php?id=<?= $student->id ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <br>
    <a class="action" href="create.php">Add a new Student</a>

</div>

<?php include('../includes/admin_footer.php');  ?>
