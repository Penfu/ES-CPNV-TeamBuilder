<?php

namespace App\Controllers;

use App\Providers\Auth,
    App\Models\Members,
    App\Models\Roles,
    App\Models\Status;

class ProfileController extends Controller
{
    public function index()
    {
        $member = Auth::user();
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
