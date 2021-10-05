<?php

namespace App\Traits;

trait Slug
{
    protected string $slug;
    
    public static function slug($value)
    {
        return self::where('slug', $value)->first()->id;
    }
}
