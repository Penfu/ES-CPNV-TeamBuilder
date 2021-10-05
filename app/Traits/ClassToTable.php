<?php

namespace App\Traits;

trait ClassToTable
{
    // Return the child class name without namespace for match with database tables
    public static function toTable($class)
    {
        return strtolower((new \ReflectionClass($class))->getShortName());
    }
}
