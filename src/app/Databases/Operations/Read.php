<?php

namespace App\Databases\Operations;

use App\Databases\Model;
use App\Databases\Query;
use App\Databases\Connector;

class Read extends Query
{
    private array $columns;
    private ?array $conditions;
    private string $query;
    private array $orderBy;
    private string $orderDirection;
    private bool $returnAsDirectObject = false;

    /**
     * @param Model $class is the Model calling the query
     * @param array $columns is an array of object attributes
     */
    public function __construct(string $class, array $columns)
    {
        $this->columns = $columns;

        parent::__construct($class);
        return $this;
    }

    /**
     * @param string $column of the where clause
     * @param string|int $value of the where clause
     */
    public function where(string $column, string|int $value): self
    {
        $this->conditions[] = $column;
        $this->params[$column] = $value;

        return $this;
    }

    public function orderBy(string $column, ?string $direction = 'asc'): self
    {
        $this->orderBy[] = $column;
        $this->orderDirection = $direction;
        
        return $this;
    }

    /**
     * Execute the request by specifying to directly return the object without an array
     * if this does not exist, then return null
     */
    public function first(): Model | null
    {
        $this->returnAsDirectObject = true;
        return $this->get();
    }

    /**
     *  @return Model[]|Model|null
     */
    public function get(): array | Model | null
    {
        $this->query = 'SELECT ' . implode(', ', $this->columns) . ' FROM ' . $this->table;

        if (isset($this->conditions) && !empty($this->conditions)) {
            for ($i = 0; $i < count($this->conditions); $i++) $this->conditions[$i] .= ' = :' . $this->conditions[$i];
            $this->query .= ' WHERE ' . implode(' AND ', $this->conditions);
        }

        if (isset($this->orderBy)) {
            $this->query .= ' ORDER BY ' . implode(', ', $this->orderBy) . ' ' . $this->orderDirection;
        }

        return $this->execute();
    }

    /**
     * @return Model[]|Model|null
     */
    private function execute(): array | Model | null
    {
        $stmt = Connector::connect()->prepare($this->query);
        $stmt->execute($this->params);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, $this->class);
        $result = $stmt->fetchAll();

        return $this->returnAsDirectObject ? (empty($result) ? null : reset($result)) : $result;
    }
}
