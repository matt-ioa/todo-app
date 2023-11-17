<?php
namespace App\ViewHelpers;

class TaskHelper
{
    public static function renderTasks(array $tasks): string
    {
        $output = '';
        foreach ($tasks as $task) {
            $id = $task['id'];
            $output .= '<form method="POST" class="task" action="tasks/'
                . $id
                . '"><div class="task-label">'
                . $task['message']
                . '<input type="hidden" name="_method" value="PUT">'
                . '<div id="buttons">'
                . '<input class="done-button" type="submit" value="✓">'
                . '</form>'
                . '<form method="GET" action="tasks/' . $id . '">'
                . '<input class="edit-button" type="submit" value="✎">'
                . '</form>'
                . '</div>'
                . '</div>';
        }
        return $output;
    }

}
