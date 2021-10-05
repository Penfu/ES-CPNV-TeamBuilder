<?php

use PHPUnit\Framework\TestCase;
use App\Models\Teams;
use App\Models\Members;

class TeamsTest extends TestCase
{
    /**
     * @covers Teams::all()
     */
    public function testAll()
    {
        $this->assertEquals(15, count(Teams::All()));
    }

    /**
     * @covers Teams::find(id)
     */
    public function testFind()
    {
        $this->assertInstanceOf(Teams::class, Teams::find(1));
        $this->assertNull(Teams::find(1));
    }


    public function testCreate()
    {
        $this->assertTrue(Teams::create(["name" => "XXX", "role_id" => 1]));
        $this->assertFalse(Teams::create(["name" => "XXX", "role_id" => 1]));
    }

    /**
     * @covers $Teams->save()
     */
    public function testSave()
    {
        $Teams = Teams::find(1);
        $savename = $Teams->name;
        $Teams->name = "newname";
        $this->assertTrue($Teams->save());
        $this->assertEquals("newname", Teams::find(1)->name);
        $Teams->name = $savename;
        $Teams->save();
    }

    /**
     * @covers $Teams->save() doesn't allow duplicates
     */
    public function testSaveRejectsDuplicates()
    {
        $Teams = Teams::find(1);
        $Teams->name = Teams::find(2)->name;
        $this->assertFalse($Teams->save());
    }

    public function testDelete()
    {
        $Teams = Teams::find(1);
        $this->assertFalse($Teams->delete()); // expected to fail because of foreign key
        Teams::create(["name" => "dummy", "state_id" => 1]);
        $id = $Teams->id;
        $this->assertTrue($Teams->delete()); // expected to succeed
        $this->assertNull(Teams::find($id)); // we should not find it back
    }

    public function testTeams()
    {
        $this->assertEquals(1, count(Members::find(3)->Team()));
        $this->assertEquals(0, count(Members::find(9)->Team()));
        $this->assertEquals(3, count(Members::find(10)->Team()));
    }
}
