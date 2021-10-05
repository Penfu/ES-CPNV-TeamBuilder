<?php

require dirname(dirname(__FILE__)) . '/vendor/autoload.php';
require dirname(dirname(__FILE__)) . '/config/config.php';
require_once APP_ROOT . '/.env.php';

use \App\Models\Members;
use \App\Controllers\HomeController;
use App\Controllers\MembersController;
use App\Controllers\MyTeamsController;
use App\Controllers\TeamController;
use App\Controllers\ModeratorsController;

$_SESSION['userLog'] = Members::find(USER_ID); // Armand

$GLOBALS['view'] = isset($_GET['view']) ? $_GET['view'] : 'home';

switch ($view) {
    case 'home': {
            (new HomeController())->index();
            break;
        }
    case 'membres': {
            (new MembersController())->index();
            break;
        }
    case 'mes-equipes': {
            (new MyTeamsController())->index();
            break;
        }
    case 'equipe': {
            (new TeamController())->index();
            break;
        }
    case 'moderateurs': {
            (new ModeratorsController())->index();
            break;
        }
    default: {
            (new HomeController())->index();
            break;
        }
}
