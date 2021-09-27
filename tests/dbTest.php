<?php

use PHPUnit\Framework\TestCase;

require "./model/DB.php";

class DbTest extends TestCase
{
    private $DB;

    public function setUp(): void
    {
        $this->DB = new DB();
    }

    public function testCanSelectMany()
    {
        $res = $this->DB->selectMany("SELECT * FROM roles", []);
        $this->assertCount(2, $res);
    }

    /*
    public function testCanSelectOne()
    {

    }

    public function testCanInsert()
    {

    }

    public function testCanExecute()
    {

    }
    */
}
