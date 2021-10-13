<?php

namespace App\Controllers;

use App\Providers\Auth;

class MyTeamsController extends Controller
{
    public function index()
    {
        return $this->render('my-teams', ['teams' => Auth::user()->teams()]);
    }
}
