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

    public function addTask(string $message): bool {
        $query = $this->db->prepare(
            'INSERT INTO `tasks` (`message`) VALUES (:message)'
        );

        $query->bindParam(':message', $message);
        $query->execute();
        return true;

    }

    public function markDone(int $id): bool {
        $query = $this->db->prepare(
            'UPDATE `tasks` SET `done` = 1 WHERE `id` = :id'
        );

        $query->bindParam(':id', $id);
        $query->execute();
        return true;

    }

    public function delete(int $id): bool {
        $query = $this->db->prepare(
            'DELETE FROM `tasks` WHERE `id` = :id'
        );

        $query->bindParam(':id', $id);
        $query->execute();
        return true;

    }

    public function getUncompletedTasks(): array
    {
        $query = $this->db->prepare(
            'SELECT `id`, `message`, `done`, `created` FROM tasks WHERE `done` = 0'
        );

        $query->execute();
        return $query->fetchAll();
    }

    public function getCompletedTasks(): array
    {
        $query = $this->db->prepare(
            'SELECT `id`, `message`, `done`, `created` FROM tasks WHERE `done` = 1'
        );

        $query->execute();
        return $query->fetchAll();
    }


}