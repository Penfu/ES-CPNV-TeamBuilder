<?php

use PHPUnit\Framework\TestCase;
use App\Models\Roles;

class RoleTest extends TestCase
{
    /**
     * @covers Roles::all()
     */
    public function testAll()
    {
        $this->assertEquals(2, count(Roles::all()));
    }

    /**
     * @covers Members::find(id)
     */
    public function testFind()
    {
        $this->assertInstanceOf(Roles::class, Roles::find(1));
        $this->assertNull(Roles::find(1000));
    }

    /**
     * @covers $Roles->save()
     */
    public function testSave()
    {
        $newname = 'newname';

        $Roles = Roles::find(1);
        $savename = $Roles->name;
        $Roles->name = $newname;

        $this->assertTrue($Roles->save());
        $this->assertEquals($newname, Roles::find(1)->name);

        $Roles->name = $savename;
        $Roles->save();
    }

    public function testSaveRejectsDuplicates()
    {
        $Roles = Roles::find(1);
        $Roles->name = Roles::find(2)->name;
        $this->assertFalse($Roles->save());
    }

    public function testDelete()
    {
        $Roles = Roles::find(1);
        $this->assertFalse($Roles->delete()); // expected to fail because of foreign key
        $Roles = new Roles();
        $Roles->slug = "ZZZ";
        $Roles->name = "dummy";
        $id = $Roles->id;
        $this->assertTrue($Roles->delete()); // expected to succeed
        $this->assertNull(Roles::find($id)); // we should not find it back
    }
}
