<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Todo App</title>
</head>
<body>
<h1>TODO App</h1>
<h2>Completed Tasks</h2>
<div id="task-list">
    <?php
    echo \App\ViewHelpers\CompletedTaskHelper::renderTasks($tasks);
    ?>
</div>
<div id="home-link">
    <a href="/">Go back</a>
</div>
</body>
</html>
