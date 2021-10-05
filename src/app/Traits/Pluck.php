<?php

namespace App\Traits;

trait Pluck
{
    public static function pluck($arrayOfObject, $property) : array
    {
        $array = [];
        foreach ($arrayOfObject as $object)
        {
            $array[] = $object->$property;
        }

        return $array;
    }
}
