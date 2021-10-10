<?php

namespace App\Controllers;

use App\Databases\Operations\OrderDirections;
use App\Models\Members;
use App\Models\Roles;

class ModeratorsController extends Controller
{
    public function index()
    {
        $moderators = Members::where('role_id', Roles::where('slug', 'MOD')->first()->id)->orderBy('name')->get();
        
        return $this->render('moderators', ['moderators' => $moderators]);
    }
}
