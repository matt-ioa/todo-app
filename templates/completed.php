<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Todo App</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div id="container">
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
</div>
</body>
</html>
