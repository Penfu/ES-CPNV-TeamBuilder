<?php

use Router\Router;
use App\Providers\Auth;
use App\Models\Members;
use App\Controllers\Error,
    App\Controllers\ErrorController;

require dirname(dirname(__FILE__)) . '/vendor/autoload.php';
require dirname(dirname(__FILE__)) . '/config/config.php';
require APP_ROOT . '.env.php';



$router = new Router($_SERVER['REQUEST_URI']);

$router->get('/', 'App\Controllers\HomeController@index')->name('home');
$router->get('/membres', 'App\Controllers\MembersController@index')->name('members');
$router->post('/membre-:id/moderateur', 'App\Controllers\MembersController@defineModerator');
$router->get('/mes-equipes', 'App\Controllers\MyTeamsController@index')->name('my-teams');
$router->get('/equipe-:id', 'App\Controllers\TeamController@index')->name('team');
$router->post('/equipe', 'App\Controllers\TeamController@create');
$router->get('/moderateurs', 'App\Controllers\ModeratorsController@index')->name('moderators');

$router->get('/profile', 'App\Controllers\ProfileController@index')->name('my-profile');
$router->get('/profile-:id', 'App\Controllers\ProfileController@profile')->name('profile');
$router->post('/profile-:id/mode/edition', 'App\Controllers\ProfileController@editionMode');
$router->post('/profile-:id/edit', 'App\Controllers\ProfileController@edit');

$router->post('/logout', 'App\Providers\Auth@logout');

session_start();

try {
    Auth::login(Members::find(USER_ID));
    $router->run();
} catch (PDOException $e) {
    (new ErrorController)->index(Error::DATABASE_ERROR);
}
