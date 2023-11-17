<?php

declare(strict_types=1);


namespace App\Models;


use PDO;

class TasksModel
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getTasks(): array
    {
        $query = $this->db->prepare(
            'SELECT `id`, `message`, `done`, `created` FROM tasks'
        );

        $query->execute();
        return $query->fetchAll();
    }


}