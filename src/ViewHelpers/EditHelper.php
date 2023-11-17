<?php
namespace App\ViewHelpers;

class EditHelper
{
    public static function renderTask(array $task): string
    {
        return '<form method="POST" class="task" action="/tasks/'
            . $task['id']
            . '"><input type="hidden" name="_method" value="PATCH">'
            . '<input name="message" value="'. $task['message']
            . '"><input class="save-button" type="submit" value="Save">'
            . '</form>';
    }

}
