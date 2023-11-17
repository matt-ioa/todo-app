<?php

declare(strict_types=1);


namespace App\Controllers;


use App\Models\TasksModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class AddTaskController
{
    private TasksModel $model;
    private PhpRenderer $renderer;

    public function __construct(TasksModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $message = $request->getParam('message');

        try {
            $this->model->addTask($message);
        }
        catch (\Exception $e) {
            $error = 'Unable to add task.';
            return $this->renderer->render($response, 'error.php', ['error' => $error]);
        }

        return $response->withHeader('Location', '/')->withStatus(301);
    }
}