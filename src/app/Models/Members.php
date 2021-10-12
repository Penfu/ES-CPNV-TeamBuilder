<?php

namespace App\Models;

use App\Databases\Model;

// Class name need to match with database table
class Members extends Model
{
    // Primary index as to be in first in variables declaration
    // Object properties visibility need to be protected for parent access
    // Object properties name need to match with database columns
    protected int $id;
    protected string $name;
    protected string $password;
    protected int $role_id;

    public function role(): Roles|null
    {
        return Roles::find($this->role_id);
    }

    public function teams() : array|null
    {
        $teams_members = Team_Member::where('member_id', $this->id)->get();
        $teams = empty($teams_members) ? [] : Teams::read()->in(array_map(fn($obj) => $obj->team_id, $teams_members))->orderBy('name')->get();

        return $teams;
    }
}
