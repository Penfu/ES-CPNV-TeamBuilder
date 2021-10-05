<?php

namespace App\Controllers;

use App\Models\Members;

class MembersController
{
    use \App\Traits\Pluck;

    public function index()
    {
        $members = Members::all();
        
        ob_start();
        require VIEW_ROOT . "/members.php";
        $content = ob_get_clean();
        require VIEW_ROOT . "/layout.php";
    }
}
