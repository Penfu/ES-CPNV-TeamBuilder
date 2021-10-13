<?php

namespace App\Controllers\Components;

abstract class Component
{
    public function render(string $path, array $params = [])
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);

        if ($params)extract($params);

        require VIEW_ROOT . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . $path . '.php';
        return ob_get_clean();
    }
}
