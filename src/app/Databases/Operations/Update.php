<?php

namespace App\Databases\Operations;

use App\Databases\Query;
use App\Databases\Connector;

class Update extends Query
{
    private array $conditions;

    /**
     * @param Model $class is the Model calling the query
     * @param array $params is an associative array of columns with there new values
     */
    public function __construct(string $class, array $params)
    {
        parent::__construct($class, $params);
        $this->build();
        $this->execute();
    }

    /**
     * Build the query
     */
    private function build()
    {
        $this->conditions = array_splice($this->params, 0, 1); // Split conditions and columns in different arrays

        $query = 'UPDATE ' . $this->table . ' SET ';

        foreach ($this->params as $key => $_) {
            $query .= $key . ' = :' . $key . ($key !== array_key_last($this->params) ? ',' : null);
        }

        $query .= ' WHERE ' . array_key_first($this->conditions) . ' = :' . array_key_first($this->conditions);

        $this->query = $query;
    }

    /**
     * Execute the query
     */
    private function execute()
    {
        Connector::connect()->prepare($this->query)->execute(array_merge($this->params, $this->conditions));
    }
}
