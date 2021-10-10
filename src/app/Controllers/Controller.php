<?php

namespace App\Controllers;

class Controller
{
    public function render(string $path, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);

        require VIEW_ROOT . $path . '.php';

        if ($params) {
            $params = extract($params);
        }
        $content = ob_get_clean();

        require VIEW_ROOT . 'layout.php';
    }
}
