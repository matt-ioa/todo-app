<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Todo App</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<div id="container">
<h1>TODO List</h1>
<h2>Edit task</h2>
<div id="edit-task">
    <?php
    echo \App\ViewHelpers\EditHelper::renderTask($task);
    ?>
</div>
<div id="home-link">
    <a href="/">Go back</a>
</div>
</div>
</body>
</html>
