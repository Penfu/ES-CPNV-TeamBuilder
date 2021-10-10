<?php

$buttons = [
    ['name' => 'Mes équipes', 'route' => 'mes-equipes', 'isActive' => $GLOBALS['view'] == 'mes-equipes'],
    ['name' => 'Membres', 'route' => 'membres', 'isActive' => $GLOBALS['view']  == 'membres'],
    ['name' => 'Modérateurs', 'route' => 'moderateurs', 'isActive' => $GLOBALS['view'] == 'moderateurs']
];

require VIEW_ROOT . '/components/navbar.php';
