<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Todo App</title>
</head>
<body>
<h1>TODO App</h1>
<form action="/tasks" method="POST">
    <label for="message">Add task:</label>
    <input id="message" type="text" name="message">
    <input type="submit" value="Add">
</form>
<div id="task-list">
    <?php
    echo \App\ViewHelpers\TaskHelper::renderTasks($tasks);
    ?>
</div>
<div id="completed-link">
    <a href="completed">Show completed tasks</a>
</div>
</body>
</html>
