<?php

namespace App\Controllers;

use App\Models\Teams;

class MyTeamsController
{
    public function index()
    {
        $teams = $_SESSION['userLog']->teams();

        ob_start();
        require VIEW_ROOT . "/my-teams.php";
        $content = ob_get_clean();
        require VIEW_ROOT . "/layout.php";
    }
}
