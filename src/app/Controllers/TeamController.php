<?php

namespace App\Controllers;

use Router\Router;
use App\Models\Teams;
use App\Models\States;
use App\Providers\Auth;

class TeamController extends Controller
{
    public function index($params)
    {
        $team = Teams::find($params);

        if (is_null($team)) {
            Router::redirect('home');
        }

        $captain = $team->captain();

        return $this->render('team', [
            'Auth' => Auth::class,
            'team' => $team,
            'captain' => $captain
        ]);
    }

    public function create()
    {
        (string)$name = htmlspecialchars($_POST['team-name']);

        if (is_null($name) || empty($name)) {
            Router::redirect('home');
        }

        try {
            $team = Teams::create(['name' => $name, 'state_id' => States::where('slug', 'RECRUTING')->first()->id]);
            $team->addMember(Auth::user(), true);
        } catch (\PDOException $e) {
            if ($e->errorInfo[0] == 23000 && $e->errorInfo[1] == 1062) {
                $_SESSION['alert'] = "Le nom de l'équipe doit être unique";
            }
        }

        Router::redirect('my-teams');
    }
}
