<?php

namespace App\Controllers;

class MyTeamsController extends Controller
{
    public function index()
    {
        $teams = $_SESSION['userLog']->teams();

        return $this->render('my-teams', ['teams' => $teams]);
    }
}
