<?php
declare(strict_types=1);

use App\Controllers\UpdateTaskAPIController;
use App\Controllers\TasksAPIController;
use App\Controllers\AddTaskAPIController;
use App\Controllers\CompletedTasksAPIController;
use Slim\App;
use Slim\Views\PhpRenderer;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', TasksAPIController::class);
    $app->get('/completed', CompletedTasksAPIController::class);
    $app->post('/tasks/{id}', UpdateTaskAPIController::class);
    $app->post('/tasks', AddTaskAPIController::class);

};
