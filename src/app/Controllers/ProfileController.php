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
        $this->renderProfile('My profile', Auth::user());
    }

    public function profile($memberId)
    {
        $member = Members::find($memberId);

        if (!isset($member) || !Auth::user()->isModerator()) {
            Router::redirect('home');
        } else if ($member == Auth::user()) {
            Router::redirect('my-profile');
        }

        $this->renderProfile('Profile', $member);
    }

    private function renderProfile($title, $member)
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
            'title' => $title,
            'member' => $member,
            'auth' => Auth::class,
            'captainOfTeams' => $captainOfTeams ?? null,
            'memberOfTeams' => $memberOfTeams ?? null,
        ]);
    }

    public function editionMode($memberId)
    {
        $member = Members::find($memberId);

        if (!isset($member)) {
            Router::redirect('home');
        }

        return $this->render('profile-edition', [
            'member' => $member
        ]);
    }

    public function edit($memberId)
    {
        $member = Members::find($memberId);

        if (!isset($member)) {
            Router::redirect('home');
        }
    }
}
