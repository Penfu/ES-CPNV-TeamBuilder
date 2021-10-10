<?php

require dirname(dirname(__FILE__)) . '/vendor/autoload.php';
require dirname(dirname(__FILE__)) . '/config/config.php';
require_once APP_ROOT . '/.env.php';

use Router\Router;
use \App\Models\Members;

$_SESSION['userLog'] = Members::find(USER_ID);

$url = $_SERVER['REQUEST_URI'];
$GLOBALS['view'] = $url;

$router = new Router($url ?? null);

$router->get('/', 'App\Controllers\HomeController@index');
$router->get('/membres', 'App\Controllers\MembersController@index');
$router->get('/mes-equipes', 'App\Controllers\MyTeamsController@index');
$router->get('/equipe-:id', 'App\Controllers\TeamController@index');
$router->get('/moderateurs', 'App\Controllers\ModeratorsController@index');

$router->run();
