<?php

namespace App\Controllers;

use Router\Router;

abstract class Error
{
    const NOT_FOUND = [
        'code' => 404,
        'message' => "Le serveur n'a rien trouvé correspondant à l'URI de demande."
    ];
    const METHOD_NOT_ALLOWED = [
        'code' => 405,
        'message' => "La méthode d'accès utilisée n'est pas autorisée."
    ];
    const INTERNAL_SERVER_ERROR = [
        'code' => 500,
        'message' => "Le serveur a rencontré une condition inattendue qui l'a empêché de répondre à la demande."
    ];
    const DATABASE_ERROR = [
        'code' => 500,
        'message' => "Problème de connexion à la base de données."
    ];
}

class ErrorController extends Controller
{
    public function index($error)
    {
        $router = Router::class;
        (int) $code = $error['code'];
        (string) $message = htmlspecialchars($error['message']);

        http_response_code($code);

        require VIEW_ROOT . '/error.php';
    }
}
