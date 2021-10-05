<?php

namespace App\Controllers;

use App\Models\Teams;

class TeamController
{
    public function index()
    {
        $idTeam = 0;

        if (isset($_GET['equipe'])) {
            $idTeam = (int)$_GET['equipe'];
        }

        $team = Teams::find($idTeam);

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
}
