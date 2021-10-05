<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        ob_start();
        require VIEW_ROOT . "/home.php";
        $content = ob_get_clean();
        require VIEW_ROOT . "/layout.php";
    }
}
