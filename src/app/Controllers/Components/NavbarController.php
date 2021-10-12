<?php

namespace App\Controllers\Components;

use Router\Router;

class NavbarController
{
    public function render($path)
    {
        $buttons = [
            [
                'name' => 'Mes équipes',
                'route' => Router::route('my-teams'),
                'isActive' => $path == Router::route('my-teams')
            ],
            [
                'name' => 'Membres',
                'route' => Router::route('members'),
                'isActive' => $path  == Router::route('members')
            ],
            [
                'name' => 'Modérateurs',
                'route' => Router::route('moderators'),
                'isActive' => $path == Router::route('moderators')
            ]
        ];

        require VIEW_ROOT . 'components/navbar.php';
    }
}
