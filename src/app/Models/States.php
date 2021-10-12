<?php

namespace App\Models;

use App\Databases\Model;

// Class name need to match with database table
class States extends Model
{
    use \App\Traits\Slug;

    // Primary index as to be in first in variables declaration
    // Object properties visibility need to be protected for parent access
    // Object properties name need to match with database columns
    protected int $id;
    protected string $name;
}
