<?php

use PHPUnit\Framework\TestCase;
use App\Models\Members;

class MemberTest extends TestCase
{
    /**
     * @covers Members::All()
     */
    public function testAll()
    {
        $this->assertEquals(51, count(Members::All()));
    }

    /**
     * @covers Members::find(id)
     */
    public function testFind()
    {
        $this->assertInstanceOf(Members::class, Members::find(1));
        $this->assertNull(Members::find(1000));
    }

    /**
     * @covers Members::where(column, criteria)
     */
    public function testWhere()
    {
        $this->assertEquals(5, count(Members::where('role_id', 2)->get()));
        $this->assertEquals(0, count(Members::where('role_id', 222)->get()));
    }

    public function testCreate()
    {
        $this->assertTrue(Members::create(["name" => "XXX", "password" => 'XXXPa$$w0rd', "role_id" => 1]));
        $this->assertFalse(Members::create(["name" => "XXX", "password" => 'XXXPa$$w0rd', "role_id" => 1]));
    }

    public function testSave()
    {
        $newname = 'newname';

        $Members = Members::find(1);
        $savename = $Members->name;
        $Members->name = $newname;

        $this->assertTrue($Members->save());
        $this->assertEquals($newname, Members::find(1)->name);

        // Reset
        $Members->name = $savename;
        $Members->save();
    }


    public function testSaveRejectsDuplicates()
    {
        $Members = Members::find(1);
        $Members->name = Members::find(2)->name;
        $this->assertFalse($Members->save());
    }

    public function testDelete()
    {
        $Members = Members::find(1);
        $this->assertFalse($Members->delete()); // expected to fail because of foreign key
        Members::create(["name" => "dummy", "password" => "dummy", "role_id" => 1]); // to get an id from the db
        $id = $Members->id;
        $this->assertTrue($Members->delete()); // expected to succeed
        $this->assertNull(Members::find($id)); // we should not find it back
    }
}
