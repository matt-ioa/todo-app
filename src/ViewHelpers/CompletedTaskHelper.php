<?php
namespace App\ViewHelpers;

class CompletedTaskHelper
{
    public static function renderTasks(array $tasks): string
    {
        $output = '';
        foreach ($tasks as $task) {
            $id = $task['id'];
           $output .= '<form method="POST" class="task" action="tasks/' . $task['id'] . '"><div>'
               . $task['message']
               . '<input type="hidden" name="_method" value="DELETE">'
               . '<input type="submit" value="Delete">'
               . '</div>'
            . '</form>';
        }
        return $output;
    }

}
