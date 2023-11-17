<?php

declare(strict_types=1);


namespace App\Controllers;


use App\Models\TasksModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class AddTaskAPIController
{
    private TasksModel $model;
    private PhpRenderer $renderer;

    // Here, the parameter is automatically supplied by the Dependency Injection Container based on the type hint
    public function __construct(TasksModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $message = $request->getParam('message');
        $result = false;

        $result = $this->model->addTask($message);

        // Put error handling here

        return $response->withHeader('Location', '/')->withStatus(301);
    }
}