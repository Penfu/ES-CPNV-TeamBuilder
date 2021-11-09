<?php

namespace App\Databases\Operations;

use App\Databases\Query;
use App\Databases\Connector;

class Delete extends Query
{
    /**
     * @param Model $class is the Model calling the query
     * @param array $params is an associative array with the primary id as key and is value as value
     */
    public function __construct(string $class, array $params)
    {
        parent::__construct($class, $params);

        // Build the query
        $this->query = 'DELETE FROM ' . $this->table . ' WHERE ' . array_key_first($this->params) . ' = :' . array_key_first($this->params);

        // Perform the query to the databases
        Connector::getInstance()->pdo()->prepare($this->query)->execute($this->params);
    }
}
