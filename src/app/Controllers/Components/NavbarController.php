<?php

namespace App\Controllers\Components;

use Router\Router;
use App\Providers\Auth;

class NavbarController extends Component
{
    public function index()
    {
        return parent::render('navbar', [
            'Router' => Router::class,
            'Auth' => Auth::class,
        ]);
    }
}
