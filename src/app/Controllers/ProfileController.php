<?php

namespace App\Controllers;

use App\Providers\Auth,
    Router\Router,
    App\Models\Members,
    App\Models\Roles,
    App\Models\Status;

class ProfileController extends Controller
{
    public function index()
    {
        $this->renderProfile(Auth::user());
    }

    public function profile($memberId)
    {
        if (!Auth::user()->isModerator()) {
            Router::redirect('home');
        }

        $this->renderProfile(Members::find($memberId));
    }

    private function renderProfile($member)
    {
        $teams = $member->teams();

        foreach ($teams as $team) {
            if ($member == $team->captain()) {
                $captainOfTeams[] = $team;
            } else {
                $memberOfTeams[] = $team;
            }
        }

        return $this->render('profile', [
            'member' => $member,
            'captainOfTeams' => $captainOfTeams ?? null,
            'memberOfTeams' => $memberOfTeams ?? null,
        ]);
    }
}
