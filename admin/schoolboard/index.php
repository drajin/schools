<?php

require('../../config/bootstrap.php');



    $schools = $query->select_all('schools');

    ?>

<?php $page_title = 'School Boards'; ?>


<?php include('../includes/admin_header.php');  ?>

<?php include('../includes/massages.php');  ?>


<table class="table">
    <thead class="thead-dark">
    <tr>

        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col"></th>
        <th scope="col"></th>

    </tr>
    </thead>
    <tbody>

    <?php foreach($schools as $school): ?>
        <tr>
            <th scope="row"><?= $school->id; ?></th>
            <th scope="col"><?= $school->school_name; ?></th>
            <td scope="col"><a href="edit.php?id=<?= $school->id ?>">Edit</a></td>
            <td scope="col"><a href="delete.php?id=<?= $school->id ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>


    </tbody>

</table>
    <a href="create.php">Add a new School Board</a>
</div>

<?php include('../includes/admin_footer.php');  ?>




