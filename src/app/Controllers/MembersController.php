<?php

namespace App\Controllers;

use App\Models\Members;

class MembersController
{
    public function index()
    {
        $members = Members::all(true)->orderBy('name')->get();

        ob_start();
        require VIEW_ROOT . "/members.php";
        $content = ob_get_clean();
        require VIEW_ROOT . "/layout.php";
    }
}
