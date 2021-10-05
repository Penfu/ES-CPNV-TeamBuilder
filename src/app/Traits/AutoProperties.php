<?php

namespace App\Traits;

// Can be override by custom function with strict name ex: getTitle() setTitle()
trait AutoProperties
{
    public function __get($name)
    {
        $method = 'get%s' . ucfirst($name);

        if (method_exists($this, $method)) { // Check for 'get{$Name}' method
            return $this->$method();
        } else if (isset($this->$name)) { // Check for '{$name}' variables
            return $this->$name;
        }
    }

    public function __set($name, $value)
    {
        $method = 'set%s' . ucfirst($name);

        if (method_exists($this, $method)) { // Check for 'set{$Name}' method
            $this->$method($value);
        } else if (isset($this->$name)) { // Check for '{$name}' variables
            $this->$name = $value;
        }
    }
}
