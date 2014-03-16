<?php
class CaverTest extends PHPUnit_Framework_TestCase
{
    public function testCaverSerialization() {
        $caver = new Caver(0,0,Direction::North);
        $this->assertEquals("(0,0)N ALIVE", (string)$caver);
    }
    public function testMoveForwardNorth() {
        $control = new Caver(0,1,Direction::North);
        $caver = new Caver(0,0,Direction::North);
        $caver->moveForward();
        $this->assertEquals((string)$control, (string)$caver);
    }
    public function testMoveForwardSouth() {
        $control = new Caver(0,0,Direction::South);
        $caver = new Caver(0,1,Direction::South);
        $caver->moveForward();
        $this->assertEquals((string)$control, (string)$caver);
    }
    public function testMoveForwardEast() {
        $control = new Caver(1,0,Direction::East);
        $caver = new Caver(0,0,Direction::East);
        $caver->moveForward();
        $this->assertEquals((string)$control, (string)$caver);
    }
    public function testMoveForwardWest() {
        $control = new Caver(0,0,Direction::West);
        $caver = new Caver(1,0,Direction::West);
        $caver->moveForward();
        $this->assertEquals((string)$control, (string)$caver);
    }
    public function testTurnLeftNorth() {
        $control = new Caver(0,0,Direction::West);
        $caver = new Caver(0,0,Direction::North);
        $caver->turnLeft();
        $this->assertEquals((string)$control, (string)$caver);
    }
    public function testTurnLeftEast() {
        $control = new Caver(0,0,Direction::North);
        $caver = new Caver(0,0,Direction::East);
        $caver->turnLeft();
        $this->assertEquals((string)$control, (string)$caver);
    }
    public function testTurnLeftSouth() {
        $control = new Caver(0,0,Direction::East);
        $caver = new Caver(0,0,Direction::South);
        $caver->turnLeft();
        $this->assertEquals((string)$control, (string)$caver);
    }
    public function testTurnLeftWest() {
        $control = new Caver(0,0,Direction::South);
        $caver = new Caver(0,0,Direction::West);
        $caver->turnLeft();
        $this->assertEquals((string)$control, (string)$caver);
    }
    public function testTurnRightNorth() {
        $control = new Caver(0,0,Direction::East);
        $caver = new Caver(0,0,Direction::North);
        $caver->turnRight();
        $this->assertEquals((string)$control, (string)$caver);
    }
    public function testTurnRightEast() {
        $control = new Caver(0,0,Direction::South);
        $caver = new Caver(0,0,Direction::East);
        $caver->turnRight();
        $this->assertEquals((string)$control, (string)$caver);
    }
    public function testTurnRightSouth() {
        $control = new Caver(0,0,Direction::West);
        $caver = new Caver(0,0,Direction::South);
        $caver->turnRight();
        $this->assertEquals((string)$control, (string)$caver);
    }
    public function testTurnRightWest() {
        $control = new Caver(0,0,Direction::North);
        $caver = new Caver(0,0,Direction::West);
        $caver->turnRight();
        $this->assertEquals((string)$control, (string)$caver);
    }
    public function testIsDead() {
        $control = new Caver(0,-1,Direction::South);
        $caver = new Caver(0,0,Direction::South);
        $caver->moveForward();
        $this->assertEquals((string)$control, (string)$caver);
    }
}
?>