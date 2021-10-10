<?php

namespace App\Controllers;

use App\Models\Members;

class MembersController extends Controller
{
    public function index()
    {
        $members = Members::all(true)->orderBy('name')->get();

        return $this->render('members', compact('members'));
    }
}
