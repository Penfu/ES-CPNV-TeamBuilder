<?php

require dirname(dirname(__FILE__)) . '/vendor/autoload.php';
require dirname(dirname(__FILE__)) . '/config/config.php';
require_once APP_ROOT . '/.env.php';

use \App\Models\Members;
use \App\Controllers\HomeController;
use App\Controllers\MembersController;

$_SESSION['userLog'] = Members::find(USER_ID); // Armand

if(!isset($_GET['view']))
{
    $view = 'home';
} else {
    $view = $_GET['view'];
}

switch($view)
{
    case 'home': {
        (new HomeController())->index();
        break;
    }
    case 'membres': {
        (new MembersController())->index();
        break;
    }
}


