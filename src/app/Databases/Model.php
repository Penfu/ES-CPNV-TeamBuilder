<?php

namespace App\Databases;

use App\Databases\Operations\Create,
    App\Databases\Operations\Read,
    App\Databases\Operations\Update,
    App\Databases\Operations\Delete;

class Model
{
    use \App\Traits\AutoProperties;

    /**
     * @return Read
     */
    public static function read(): Read
    {
        return (new Read(static::class, array_keys(get_class_vars(static::class))));
    }

    /**
     * @return Read|Model[]
     */
    public static function all(?bool $returnQuery = false): Read | array
    {
        $query = (new Read(static::class, array_keys(get_class_vars(static::class))));
        return $returnQuery ? $query : $query->get();
    }

    /**
     * @param int $id of the row sought
     * @return object|null
     */
    public static function find($value): object | null
    {
        return (new Read(static::class, array_keys(get_class_vars(static::class))))->where('id', $value)->first();
    }

    /**
     * @param string $column of the where clause
     * @param string|int $value of the where clause
     * @return Read
     */
    public static function where(string $column, $value): Read
    {
        return (new Read(static::class, array_keys(get_class_vars(static::class))))->where($column, $value);
    }

    /**
     * @param array $values is an array of value correspond to columns of the row you want to create
     * @return object|false
     */
    public static function create($values): object|false
    {
        try {
            $id = (new Create(static::class, $values))->execute();
            return self::find($id);
        } catch (\PDOException $e) {
            return false;
        }
    }

    /**
     * Update the corresponding database row with currents object properties values
     * @return void
     */
    public function save(): void
    {
        (new Update($this::class, get_object_vars($this)));
    }

    /**
     * Delete the corresponding database row
     * @return void
     */
    public function delete(): void
    {
        (new Delete($this::class, array_slice(get_object_vars($this), 0, 1)));
    }
}
