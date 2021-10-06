<?php

namespace App\Databases;

use PDO;

require_once APP_ROOT . '/.env.php';

class Connector
{
    private $pdo;
    private static $instance;

    private function __construct()
    {
        $this->pdo = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $this->pdo->exec('SET NAMES utf8');
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function pdo()
    {
        return $this->pdo;
    }
}
