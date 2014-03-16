<?php
class DirectionTest extends PHPUnit_Framework_TestCase
{
    public function testRightFromWest() {
        $direction = Direction::West;
        $direction = Direction::right($direction);
        $this->assertEquals($direction, Direction::North);
    }
    public function testRightFromEast() {
        $direction = Direction::East;
        $direction = Direction::right($direction);
        $this->assertEquals($direction, Direction::South);
    }
    public function testRightFromNorth() {
        $direction = Direction::North;
        $direction = Direction::right($direction);
        $this->assertEquals($direction, Direction::East);
    }
    public function testRightFromSouth() {
        $direction = Direction::South;
        $direction = Direction::right($direction);
        $this->assertEquals($direction, Direction::West);
    }

    public function testLeftEast() {
        $direction = Direction::East;
        $direction = Direction::left($direction);
        $this->assertEquals($direction, Direction::North);
    }
    public function testLeftNorth() {
        $direction = Direction::North;
        $direction = Direction::left($direction);
        $this->assertEquals($direction, Direction::West);
    }
    public function testLeftWest() {
        $direction = Direction::West;
        $direction = Direction::left($direction);
        $this->assertEquals($direction, Direction::South);
    }
    public function testLeftSouth() {
        $direction = Direction::South;
        $direction = Direction::left($direction);
        $this->assertEquals($direction, Direction::East);
    }
    public function testSingleCharacterRepresentationSouth() {
        $direction = Direction::South;
        $singleCharRepresentation = Direction::singleCharRepresentation($direction);
        $this->assertEquals($singleCharRepresentation, 'S');
    }
    public function testSingleCharacterRepresentationNorth() {
        $direction = Direction::North;
        $singleCharRepresentation = Direction::singleCharRepresentation($direction);
        $this->assertEquals($singleCharRepresentation, 'N');
    }
    public function testSingleCharacterRepresentationWest() {
        $direction = Direction::West;
        $singleCharRepresentation = Direction::singleCharRepresentation($direction);
        $this->assertEquals($singleCharRepresentation, 'W');
    }
    public function testSingleCharacterRepresentationEast() {
        $direction = Direction::East;
        $singleCharRepresentation = Direction::singleCharRepresentation($direction);
        $this->assertEquals($singleCharRepresentation, 'E');
    }
}
?>