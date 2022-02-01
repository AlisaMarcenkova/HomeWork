<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        header {
            background: #e3e3e3;
            padding: 2em;
        }
    </style>
</head>
<body>
<header>
    <h1>Task For The Day</h1>
   <ul>
        <?php foreach ($task as $heading => $value) : ?>
<li>
    <strong><?= ucwords($heading); ?></strong> <?= $value; ?>
</li>
        <?php endforeach; ?>
    </ul>
    <ul>
        <li>
            <strong>Name: </strong><?= $task['title']; ?>
        </li>
        <li>
            <strong>Due Date: </strong><?= $task['due']; ?>
        </li>
        <li>
            <strong>Assigned to: </strong><?= $task['assigned_to']; ?>
        </li>
        <li>
            <strong>Completed: </strong><?= $task['completed'] ? "Completed" : "Incomplete"; ?>
        </li>
        <li>
            <strong>Finished: </strong>
            <?php
            if($task['completed']){
                echo '&#9989';
            } else {
                echo '&#x2612;';
            }
            ?>
        </li>
    </ul>

</header>
</body>
</html>
