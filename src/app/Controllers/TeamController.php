<?php

namespace App\Controllers;

use App\Models\Teams;

class TeamController extends Controller
{
    public function index($params)
    {
        $team = Teams::find($params);

        if (is_null($team)) {
            header('Location: ./');
            exit();
        }

        return $this->render('team', compact('team'));
    }

    public function createTeam()
    {
        
    }
}
