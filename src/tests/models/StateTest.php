<?php

require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';
require_once dirname(dirname(dirname(__FILE__))) . '/config/config.php';

use PHPUnit\Framework\TestCase,
    App\Models\States;

class StateTest extends TestCase
{
    /**
     * @covers States::all()
     */
    public function testAll()
    {
        $this->assertEquals(5, count(States::all()));
    }

    /**
     * @covers States::find(id)
     */
    public function testFind()
    {
        $this->assertInstanceOf(States::class, States::find(1));
        $this->assertNull(States::find(1000));
    }

    /**
     * @covers States::create(array)
     * @depends testDelete
     */
    public function testCreate()
    {
        $state = States::create(['slug' => 'WAIT_DEL', 'name' => 'Attente de suppression']);
        $this->assertEquals('WAIT_DEL', $state->slug);
        $this->assertEquals('Attente de suppression', $state->name);
        $state->delete();
    }

    /**
     * @covers States->save()
     * @depends testFind
     */
    public function testSave()
    {
        $state = States::find(1);
        $state->name = 'newname';
        $state->save();
        $this->assertEquals('newname', States::find(1)->name);
    }

    /**
     * @covers States->save()
     * @depends testFind
     */
    public function testSaveRejectsDuplicates()
    {
        $state = States::find(1);
        $state->name = States::find(2)->name;
        $this->expectException(PDOException::class);
        $this->expectExceptionCode(23000);
        $this->expectExceptionMessage('Integrity constraint violation: 1062');
        $state->save();
    }

    /**
     * @covers States->delete()
     * @depends testFind
     */
    public function testDelete()
    {
        $state = States::create(["slug" => "ZZZ", "name" => "dummy"]);
        $id = $state->id;
        $state->delete();
        $this->assertNull(States::find($id));
    }

    /**
     * @covers States->delete()
     * @depends testFind
     */
    public function testDeleteConstraintViolation()
    {
        $state = States::find(1);
        $this->expectException(PDOException::class);
        $this->expectExceptionCode(23000);
        $this->expectExceptionMessage('Integrity constraint violation: 1451');
        $state->delete();
    }
}
