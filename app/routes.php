<?php
declare(strict_types=1);

use App\Controllers\UpdateTaskController;
use App\Controllers\TasksController;
use App\Controllers\AddTaskController;
use App\Controllers\EditTaskController;
use App\Controllers\CompletedTasksController;
use Slim\App;
use Slim\Views\PhpRenderer;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', TasksController::class);
    $app->get('/completed', CompletedTasksController::class);
    $app->post('/tasks/{id}', UpdateTaskController::class);
    $app->get('/tasks/{id}', EditTaskController::class);
    $app->post('/tasks', AddTaskController::class);

};
