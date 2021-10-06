<?php

namespace App\Databases;

use PDO;

require_once APP_ROOT . '/.env.php';

class Connector
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    }

    public function pdo()
    {
        return $this->pdo;
    }

    public static function connect()
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $pdo->exec('SET NAMES utf8');
        return $pdo;
    }
}
