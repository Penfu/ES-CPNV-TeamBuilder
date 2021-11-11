<?php

require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';
require_once dirname(dirname(dirname(__FILE__))) . '/config/config.php';

use PHPUnit\Framework\TestCase,
    App\Models\Roles;

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
     * @covers Roles::find(id)
     */
    public function testFind()
    {
        $this->assertInstanceOf(Roles::class, Roles::find(1));
        $this->assertNull(Roles::find(1000));
    }

    /**
     * @covers Teams::create(array)
     * @depends testDelete
     */
    public function testCreate()
    {
        $team = Roles::create(['slug' => 'ADM', 'name' => 'Admin']);
        $this->assertEquals('ADM', $team->slug);
        $this->assertEquals('Admin', $team->name);
        $team->delete();
    }

    /**
     * @covers Roles->save()
     * @depends testFind
     */
    public function testSave()
    {
        $role = Roles::find(1);
        $role->name = 'newname';
        $role->save();
        $this->assertEquals('newname', Roles::find(1)->name);
    }

    /**
     * @covers Roles->save()
     * @depends testFind
     */
    public function testSaveRejectsDuplicates()
    {
        $role = Roles::find(1);
        $role->name = Roles::find(2)->name;
        $this->expectException(PDOException::class);
        $this->expectExceptionCode(23000);
        $this->expectExceptionMessage('Integrity constraint violation: 1062');
        $role->save();
    }

    /**
     * @covers Roles->delete()
     * @depends testFind
     */
    public function testDelete()
    {
        $role = Roles::create(["slug" => "ZZZ", "name" => "dummy"]);
        $id = $role->id;
        $role->delete();
        $this->assertNull(Roles::find($id));
    }

    /**
     * @covers Roles->delete()
     * @depends testFind
     */
    public function testDeleteConstraintViolation()
    {
        $role = Roles::find(1);
        $this->expectException(PDOException::class);
        $this->expectExceptionCode(23000);
        $this->expectExceptionMessage('Integrity constraint violation: 1451');
        $role->delete();
    }
}
