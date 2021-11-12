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

        if ($member == Auth::user()) {
            Router::redirect('my-profile');
        }
        else if (!isset($member) || !Auth::user()->isModerator()) {
            Router::redirect('home');
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
            'member' => $member,
            'auth' => Auth::class,
            'roles' => Roles::all(),
            'status' => Status::all(),
        ]);
    }

    public function edit($memberId)
    {
        $member = Members::find($memberId);

        if (!isset($member)) {
            Router::redirect('home');
        }

        if (isset($_POST['member-name'])) {
            $member->name = $_POST['member-name'];

            try {
                $member->save();
            } catch (\PDOException $e) {
                if ($e->errorInfo[0] == 23000 && $e->errorInfo[1] == 1062) {
                    $_SESSION['alert'] = "Ce nom est déjà utilisé par un autre membre.";
                    Router::redirect('my-profile');
                }
            }
        }

        $member->role_id = $_POST['member-role'] ?? $member->role_id;
        $member->status_id = $_POST['member-status'] ?? $member->status_id;
        $member->save();

        Router::redirect('my-profile');
    }
}
