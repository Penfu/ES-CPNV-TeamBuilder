<?php

namespace App\Controllers;

use App\Models\Teams;

class TeamController
{
    public function index($params)
    {
        $team = Teams::find($params);

        if (is_null($team)) {
            header('Location: ./');
            exit();
        }

        $members = $team->members();

        ob_start();
        require VIEW_ROOT . "/team.php";
        $content = ob_get_clean();
        require VIEW_ROOT . "/layout.php";
    }

    public function createTeam()
    {
        
    }
}
