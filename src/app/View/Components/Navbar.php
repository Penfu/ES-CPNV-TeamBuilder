<?php

$buttons = [
    ['name' => 'Mes équipes', 'route' => '?view=mes-equipes', 'isActive' => $GLOBALS['view'] == 'mes-equipes'],
    ['name' => 'Liste des membres', 'route' => '?view=membres', 'isActive' => $GLOBALS['view']  == 'membres'],
    ['name' => 'Modérateurs', 'route' => '?view=moderateurs', 'isActive' => $GLOBALS['view'] == 'moderateurs']
];

require VIEW_ROOT . '/components/navbar.php';
