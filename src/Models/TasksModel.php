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

    public function addTask(string $message): void {
        $query = $this->db->prepare(
            'INSERT INTO `tasks` (`message`) VALUES (:message)'
        );

        $query->bindParam(':message', $message);
        $query->execute();
    }

    public function markDone(int $id): void {
        $query = $this->db->prepare(
            'UPDATE `tasks` SET `done` = 1 WHERE `id` = :id'
        );

        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function delete(int $id): void {
        $query = $this->db->prepare(
            'DELETE FROM `tasks` WHERE `id` = :id'
        );

        $query->bindParam(':id', $id);
        $query->execute();
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

    public function getTask(int $id): array
    {
        $query = $this->db->prepare(
            'SELECT `id`, `message` FROM tasks WHERE `id` = :id'
        );

        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch();
    }

    public function updateMessage(int $id, string $message)
    {
        $query = $this->db->prepare(
            'UPDATE `tasks` SET `message` = :message WHERE `id` = :id'
        );

        $query->bindParam(':id', $id);
        $query->bindParam(':message', $message);
        $query->execute();
        return $query->fetch();
    }
}