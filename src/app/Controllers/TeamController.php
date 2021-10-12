<?php

namespace App\Controllers;

use App\Models\Teams;
use App\Models\States;

class TeamController extends Controller
{
    public function index($params)
    {
        $team = Teams::find($params);

        if (is_null($team)) {
            header('Location: ./');
            exit();
        }

        return $this->render('team', ['team' => $team]);
    }

    public function create()
    {
        (string)$name = htmlspecialchars($_POST['team-name']);

        if (is_null($name) || empty($name)) {
            header('Location: ./');
            exit();
        }

        $team = Teams::create(['name' => $name, 'state_id' => States::where('slug', 'RECRUTING')->first()->id]);

        if ($team) {
            $team->addMember($_SESSION['userLog'], true);
        } else {
            $_SESSION['alert'] = "Le nom de l'équipe doit être unique";
        }

        header('Location: ./mes-equipes');
        exit();
    }
}
