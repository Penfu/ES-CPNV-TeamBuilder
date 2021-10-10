<?php

$buttons = [
    ['name' => 'Mes équipes', 'route' => 'mes-equipes', 'isActive' => $path == 'my-teams'],
    ['name' => 'Membres', 'route' => 'membres', 'isActive' => $path  == 'members'],
    ['name' => 'Modérateurs', 'route' => 'moderateurs', 'isActive' => $path == 'moderators']
];

require VIEW_ROOT . 'components/navbar.php';
