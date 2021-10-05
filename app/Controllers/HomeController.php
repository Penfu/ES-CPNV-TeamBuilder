<?php

namespace App\Controllers;

use App\Models\Members;

class HomeController
{
    public function index()
    {
        $members = Members::all();

        ob_start();
        require VIEW_ROOT . "/home.php";
        $content = ob_get_clean();
        require VIEW_ROOT . "/layout.php";
    }
}
