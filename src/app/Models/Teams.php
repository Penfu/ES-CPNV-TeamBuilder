<?php

namespace App\Models;

use App\Databases\Model;

// Class name need to match with database table
class Teams extends Model
{
    // Primary index as to be in first in variables declaration
    // Object properties visibility need to be protected for parent access
    // Object properties name need to match with database columns
    protected int $id;
    protected string $name;
    protected int $state_id;

    public function members(): array
    {
        $teams_members = Team_Member::where('team_id', $this->id)->get();
        $members = [];

        foreach ($teams_members as $team_member) {
            $members[] = Members::find($team_member->member_id);
        }

        return $members;
    }

    public function addMember(Members $member, ?bool $isCaptain = false)
    {
        Team_Member::create([
            'member_id' => $member->id,
            'team_id' => $this->id,
            'membership_type' => 1,
            'is_captain' => $isCaptain,
        ]);
    }

    public function captain(): Members
    {
        $team_member = Team_Member::where('team_id', $this->id)->where('is_captain', true)->first();
        return Members::find($team_member->member_id);
    }
}
