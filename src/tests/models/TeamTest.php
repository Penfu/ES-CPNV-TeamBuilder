<?php

require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';
require_once dirname(dirname(dirname(__FILE__))) . '/config/config.php';

use PHPUnit\Framework\TestCase,
    App\Models\Teams,
    App\Models\Members;

class TeamTest extends TestCase
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
        $this->assertNull(Teams::find(1000));
    }

    /**
     * @covers Teams::create(array)
     * @depends testDelete
     */
    public function testCreate()
    {
        $team = Teams::create(['name' => 'XXX', 'state_id' => 1]);
        $this->assertEquals('XXX', $team->name);
        $this->assertEquals(1, $team->state_id);
        $team->delete();
    }

    /**
     * @covers Teams->save()
     * @depends testFind
     */
    public function testSave()
    {
        $team = Teams::find(1);
        $team->name = 'newname';
        $team->save();
        $this->assertEquals('newname', Teams::find(1)->name);
    }

    /**
     * @covers Teams->save()
     * @depends testFind
     */
    public function testSaveRejectsDuplicates()
    {
        $team = Teams::find(1);
        $team->name = Teams::find(2)->name;
        $this->expectException(PDOException::class);
        $this->expectExceptionCode(23000);
        $this->expectExceptionMessage('Integrity constraint violation: 1062');
        $team->save();
    }

    /**
     * @covers Teams->delete()
     * @depends testFind
     */
    public function testDelete()
    {
        $team = Teams::create(['name' => 'dummy', 'state_id' => 1]);
        $id = $team->id;
        $team->delete();
        $this->assertNull(Teams::find($id));
    }

    /**
     * @covers Teams->delete()
     * @depends testFind
     */
    public function testDeleteConstraintViolation()
    {
        $team = Teams::find(1);
        $this->expectException(PDOException::class);
        $this->expectExceptionCode(23000);
        $this->expectExceptionMessage('Integrity constraint violation: 1451');
        $team->delete();
    }

    /**
     * @covers Teams->teams()
     * @depends testFind
     */
    public function testTeams()
    {
        $this->assertEquals(1, count(Members::find(3)->teams()));
        $this->assertEquals(0, count(Members::find(9)->teams()));
        $this->assertEquals(3, count(Members::find(10)->teams()));
    }
}
