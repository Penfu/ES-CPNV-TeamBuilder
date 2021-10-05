<?php

namespace App\Databases\Operations;

use App\Databases\Query;
use App\Databases\Connector;

class Create extends Query
{
    /**
     * @param Model $class is the Model calling the query
     * @param array $params is an associative array of columns with there values
     */
    public function __construct(string $class, array $params)
    {
        parent::__construct($class, $params);
        $this->build();
    }

    /**
     * Build the query
     */
    private function build()
    {
        $query = 'INSERT INTO ' . $this->table . ' VALUES (null,';
        foreach ($this->params as $key => $_) {
            $query .= ':' . $key . ($key !== array_key_last($this->params) ? ',' : null);
        }
        $query .= ');';

        $this->query = $query;
    }

    /**
     * Execute the query and return the id of inserted row
     */
    public function execute(): int
    {
        $pdo = Connector::connect();
        $pdo->prepare($this->query)->execute($this->params);

        return $pdo->lastInsertId();
    }
}
