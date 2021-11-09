<?php

namespace App\Databases\Operations;

use App\Databases\Model;
use App\Databases\Query;
use App\Databases\Connector;

class Read extends Query
{
    private array $columns;
    private ?array $whereConditions;
    private ?array $inConditions;
    private string $query;
    private array $orderBy;
    private string $orderDirection;
    private bool $returnAsDirectObject = false;

    /**
     * @param string $class is the Model calling the query
     * @param array $columns is an array of object attributes
     */
    public function __construct(string $class, array $columns)
    {
        parent::__construct($class);
        $this->columns = $columns;
    }

    /**
     * @param string $column of the where clause
     * @param string|int $value of the where clause
     */
    public function where(string $column, string|int $value): self
    {
        $this->whereConditions[] = $column;
        $this->params[$column] = $value;

        return $this;
    }

    public function in(array $values): self
    {
        for ($i = 0; $i < count($values); $i++) {
            $this->inConditions[] = $values[$i];
        }

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

        if (isset($this->whereConditions) && !empty($this->whereConditions)) {
            for ($i = 0; $i < count($this->whereConditions); $i++) $this->whereConditions[$i] .= ' = :' . $this->whereConditions[$i];
            $this->query .= ' WHERE ' . implode(' AND ', $this->whereConditions);
        }

        if (isset($this->inConditions) && !empty($this->inConditions)) {
            $this->query .= ' WHERE id IN (' . implode(',', $this->inConditions) . ')';
        }

        if (isset($this->orderBy)) {
            $this->query .= ' ORDER BY ' . implode(', ', $this->orderBy) . ' ' . $this->orderDirection;
        }

        // Perform the query to the databases
        $stmt = Connector::getInstance()->pdo()->prepare($this->query);
        $stmt->execute($this->params);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, $this->class);
        $result = $stmt->fetchAll();
        return $this->returnAsDirectObject ? (empty($result) ? null : reset($result)) : $result;
    }
}
