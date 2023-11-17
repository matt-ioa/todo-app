<?php
namespace App\ViewHelpers;

class TaskHelper
{
    public static function renderTasks(array $tasks): string
    {
        $output = '';
        foreach ($tasks as $task) {
            $id = $task['id'];
           $output .= '<form method="POST" class="task" action="tasks/' . $task['id'] . '"><div>'
               . $task['message']
               . '<input type="hidden" name="_method" value="PUT">'
               . '<input type="submit" value="Done">'
               . '</div>'
            . '</form>';
        }
        return $output;
    }

}
