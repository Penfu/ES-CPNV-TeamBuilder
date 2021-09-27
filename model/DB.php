<?php

class DB
{
    protected $PDO;

    public function __construct()
    {
        require_once '.env.php';
    }

    private function connect()
    {
        $this->PDO = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        $this->PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    private function disconnect()
    {
        unset($this->PDO);
    }

    public function selectMany($query, $args)
    {
        $this->connect();

        $req = $this->PDO->prepare($query);

        $req->execute($args);
        $result = $req->fetchAll();
        $req->closeCursor();

        $this->disconnect();

        return $result;
    }

    public function selectOne($query, $args)
    {
        $this->connect();

        $req = $this->PDO->prepare($query);

        $req->execute($args);
        $result = $req->fetchAll();
        $req->closeCursor();

        $this->disconnect();

        return $result;
    }

    public function insert($query, $args)
    {
        $this->connect();

        $req = $this->PDO->prepare($query);

        $req->execute($args);
        $req->fetchAll();
        $req->closeCursor();

        return $this->PDO->lastInsertId();

        $this->disconnect();
    }

    public function execute($query, $args)
    {
        $this->connect();

        $req = $this->PDO->prepare($query);

        $req->execute($args);
        $result = $req->fetchAll();
        $req->closeCursor();

        $this->disconnect();

        return $result;
    }
}
