<?php

namespace App\Controllers;

use App\Databases\Operations\OrderDirections;
use App\Models\Members;
use App\Models\Roles;

class ModeratorsController
{
    public function index()
    {
        $moderators = Members::where('role_id', Roles::where('slug', 'MOD')->first()->id)->orderBy('name')->get();
        
        ob_start();
        require VIEW_ROOT . "/moderators.php";
        $content = ob_get_clean();
        require VIEW_ROOT . "/layout.php";
    }
}
