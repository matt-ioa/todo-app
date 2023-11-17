<?php
namespace App\ViewHelpers;

class ErrorHelper
{
    public static function renderTasks(string $error): string
    {
        return 'There has been an error: ' . $error;
    }

}
