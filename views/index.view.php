<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Todos</title>
</head>
<body>

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
            <th scope="col"><?= $school->name; ?></th>
            <td scope="col"><a href="edit.php?id=<?= $school->id ?>">Edit</a></td>
            <td scope="col"><a href="delete.php?id=<?= $school->id ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>


    </tbody>
</table>

</body>
</html>
