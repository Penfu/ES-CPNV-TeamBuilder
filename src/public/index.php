<?php

require dirname(dirname(__FILE__)) . '/vendor/autoload.php';
require dirname(dirname(__FILE__)) . '/config/config.php';
require APP_ROOT . '.env.php';

use Router\Router;

$_SESSION['userLog'] = App\Models\Members::find(USER_ID);

$router = new Router($_SERVER['REQUEST_URI']);

$router->get('/', 'App\Controllers\HomeController@index');
$router->get('/membres', 'App\Controllers\MembersController@index');
$router->get('/mes-equipes', 'App\Controllers\MyTeamsController@index');
$router->get('/equipe-:id', 'App\Controllers\TeamController@index');
$router->get('/moderateurs', 'App\Controllers\ModeratorsController@index');

$router->run();
