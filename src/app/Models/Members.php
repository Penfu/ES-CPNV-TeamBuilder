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

    public function teams(): array
    {
        $teams_members = Team_Member::where('member_id', $this->id)->get();
        $teams = [];

        foreach ($teams_members as $team_member) {
            $teams[] = Teams::find($team_member->team_id);
        }

        usort($teams, function ($a, $b) {
            return strcmp($a->name, $b->name);
        });

        return $teams;
    }
}
