<?php

namespace App\Models;

use App\Databases\Model;

// Class name need to match with database table
class Team_Member extends Model
{
    // Primary index as to be in first in variables declaration
    // Object properties visibility need to be protected for parent access
    // Object properties name need to match with database columns
    protected int $id;
    protected int $member_id;
    protected int $team_id;
    protected int $membership_type;
    protected bool $is_captain;
}
