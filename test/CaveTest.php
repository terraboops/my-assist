<?php
class CaveTest extends PHPUnit_Framework_TestCase
{
    public function testInBoundsBottomLeft() {
        $coordinates = array('x' => Cave::CAVE_BOUND_X_MIN, 'y' => Cave::CAVE_BOUND_Y_MIN);
        $this->assertFalse(Cave::isOutOfBounds($coordinates));
    }
    public function testInBoundsTopRight() {
        $coordinates = array('x' => Cave::CAVE_BOUND_X_MAX, 'y' => Cave::CAVE_BOUND_Y_MAX);
        $this->assertFalse(Cave::isOutOfBounds($coordinates));
    }
    public function testOutOfBoundsXMin() {
        $coordinates = array('x' => Cave::CAVE_BOUND_X_MIN-1, 'y' => 0);
        $this->assertTrue(Cave::isOutOfBounds($coordinates));
    }
    public function testOutOfBoundsYMin() {
        $coordinates = array('x' => 0, 'y' => Cave::CAVE_BOUND_Y_MIN-1);
        $this->assertTrue(Cave::isOutOfBounds($coordinates));
    }
    public function testOutOfBoundsXMax() {
        $coordinates = array('x' => Cave::CAVE_BOUND_X_MAX+1, 'y' => 0);
        $this->assertTrue(Cave::isOutOfBounds($coordinates));
    }
    public function testOutOfBoundsYMax() {
        $coordinates = array('x' => 0, 'y' => Cave::CAVE_BOUND_Y_MAX+1);
        $this->assertTrue(Cave::isOutOfBounds($coordinates));
    }
}
?>