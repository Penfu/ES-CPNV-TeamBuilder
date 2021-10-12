<?php

namespace App\Controllers;

abstract class Controller
{
    public function render(string $path, ?array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);

        if ($params)extract($params);

        require VIEW_ROOT . $path . '.php';
        $content = ob_get_clean();
        require VIEW_ROOT . 'layout.php';
    }
}
