<?php

namespace App\Databases\Operations;

use App\Databases\Query;
use App\Databases\Connector;

class Update extends Query
{
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
        foreach (array_diff(array_keys($this->params), ['id']) as $key) $paramsKeys[] = $key . ' = :' . $key;
        $this->query = 'UPDATE ' . $this->table . ' SET ' . implode(',', $paramsKeys) . ' WHERE id = :id';
    }

    /**
     * Execute the query
     */
    private function execute()
    {
        Connector::getInstance()->pdo()->prepare($this->query)->execute($this->params);
    }
}
