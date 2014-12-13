<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Display list of tasks</title>
</head>
<body>
    
<table>
    <thead>
        <tr>
            <th>name</th>
            <th>description</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($tasks as $task) { ?>
    <tr>
        <td><?php echo $task->getName(); ?></td>
        <td><?php echo $task->getDescription(); ?></td>
    </tr>
    <?php } ?>
    </tbody>
</table>

</body>
</html>