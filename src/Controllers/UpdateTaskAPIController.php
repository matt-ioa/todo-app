<?php

declare(strict_types=1);


namespace App\Controllers;


use App\Models\TasksModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class UpdateTaskAPIController
{
    private TasksModel $model;
    private PhpRenderer $renderer;

    // Here, the parameter is automatically supplied by the Dependency Injection Container based on the type hint
    public function __construct(TasksModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = intval($args['id']);
        $method = $request->getParam('_method', $default = 'POST');
        $result = false;

        if ($method === 'PUT') {
            $result = $this->model->markDone($id);
            // Put error handling here
            return $response->withHeader('Location', '/')->withStatus(301);
        }
        elseif ($method === 'DELETE') {
            $result = $this->model->delete($id);
            // Put error handling here
            return $response->withHeader('Location', '/completed')->withStatus(301);
        }
        else {
            return $response->withHeader('Location', '/')->withStatus(301);
        }

    }
}