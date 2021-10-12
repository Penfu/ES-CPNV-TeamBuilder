<?php

namespace App\Controllers;

use App\Models\Members;
use App\Models\Roles;
use Router\Router;

class MembersController extends Controller
{
    public function index()
    {
        $members = Members::all(true)->orderBy('name')->get();

        return $this->render('members', ['members' => $members]);
    }

    public function defineModerator($memberId)
    {
        $member = Members::find($memberId);

        if (isset($member)) {
            $member->role_id = Roles::where('slug', 'MOD')->first()->id;
            $member->save();
        }

        Router::redirect(Router::route('members'));
    }
}
