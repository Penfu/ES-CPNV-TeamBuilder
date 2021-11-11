<?php

require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';
require_once dirname(dirname(dirname(__FILE__))) . '/config/config.php';

use PHPUnit\Framework\TestCase,
    App\Models\Members;

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
        $this->assertEquals(0, count(Members::where('role_id', 1000)->get()));
    }

    /**
     * @covers Members::create(array)
     * @depends testDelete
     */
    public function testCreate()
    {
        $member = Members::create(['name' => 'XXX', 'password' => 'XXXPa$$w0rd', 'role_id' => 1]);
        $this->assertEquals('XXX', $member->name);
        $this->assertEquals('XXXPa$$w0rd', $member->password);
        $this->assertEquals(1, $member->role_id);
        $member->delete();
    }

    /**
     * @covers Members->save()
     * @depends testFind
     */
    public function testSave()
    {
        $member = Members::find(1);
        $member->name = 'newname';
        $member->save();
        $this->assertEquals('newname', Members::find(1)->name);
    }

    /**
     * @covers Members->save()
     * @depends testFind
     */
    public function testSaveRejectsDuplicates()
    {
        $member = Members::find(1);
        $member->name = Members::find(2)->name;
        $this->expectException(PDOException::class);
        $this->expectExceptionCode(23000);
        $this->expectExceptionMessage('Integrity constraint violation: 1062');
        $member->save();
    }

    /**
     * @covers Members->delete()
     * @depends testFind
     */
    public function testDelete()
    {
        $member = Members::create(['name' => 'dummy', 'password' => 'dummy', 'role_id' => 1]);
        $id = $member->id;
        $member->delete();
        $this->assertNull(Members::find($id));
    }

    /**
     * @covers Members->delete()
     * @depends testFind
     */
    public function testDeleteConstraintViolation()
    {
        $member = Members::find(1);
        $this->expectException(PDOException::class);
        $this->expectExceptionCode(23000);
        $this->expectExceptionMessage('Integrity constraint violation: 1451');
        $member->delete();
    }

    /**
     * @covers Members->isModerator()
     * @depends testDelete
     */
    public function testIsModerator()
    {
        $member = Members::create(['name' => 'XXX', 'password' => 'XXXPa$$w0rd', 'role_id' => 1]);
        $this->assertFalse($member->isModerator());
        $member->delete();

        $member = Members::create(['name' => 'XXX', 'password' => 'XXXPa$$w0rd', 'role_id' => 2]);
        $this->assertTrue($member->isModerator());
        $member->delete();
    }
}
