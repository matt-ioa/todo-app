<?php

declare(strict_types=1);


namespace App\Controllers;


use App\Models\TasksModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class UpdateTaskController
{
    private TasksModel $model;
    private PhpRenderer $renderer;

    public function __construct(TasksModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = intval($args['id']);
        $method = $request->getParam('_method', $default = 'POST');

        if ($method === 'PUT') {
            try {
                $this->model->markDone($id);
            }
            catch (\Exception $e) {
                $error = 'Unable to mark task as done.';
                return $this->renderer->render($response, 'error.php', ['error' => $error]);
            }
            return $response->withHeader('Location', '/')->withStatus(301);

        }
        elseif ($method === 'DELETE') {
            try {
                $this->model->delete($id);
            }
            catch (\Exception $e) {
                $error = 'Unable to delete task.';
                return $this->renderer->render($response, 'error.php', ['error' => $error]);
            }
            return $response->withHeader('Location', '/completed')->withStatus(301);
        }
        elseif ($method === 'PATCH') {
            try {
                $message = $request->getParam('message', '');
                $this->model->updateMessage($id, $message);
            }
            catch (\Exception $e) {
                $error = 'Unable to edit task.';
                return $this->renderer->render($response, 'error.php', ['error' => $error]);
            }
            return $response->withHeader('Location', '/')->withStatus(301);
        }
        else {
            return $response->withHeader('Location', '/')->withStatus(301);
        }

    }
}