<?php

require dirname(dirname(__FILE__)) . '/vendor/autoload.php';
require dirname(dirname(__FILE__)) . '/config/config.php';
require APP_ROOT . '.env.php';

use Router\Router;

session_start();
$_SESSION['userLog'] = App\Models\Members::find(USER_ID);

$router = new Router($_SERVER['REQUEST_URI']);

$router->get('/', 'App\Controllers\HomeController@index')->name('home');
$router->get('/membres', 'App\Controllers\MembersController@index')->name('members');
$router->get('/mes-equipes', 'App\Controllers\MyTeamsController@index')->name('my-teams');
$router->get('/equipe-:id', 'App\Controllers\TeamController@index')->name('team');
$router->post('/equipe', 'App\Controllers\TeamController@create');
$router->get('/moderateurs', 'App\Controllers\ModeratorsController@index')->name('moderators');

$router->run();