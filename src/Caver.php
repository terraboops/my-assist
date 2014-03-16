<?php
// Caver [Model]
// Stores the position of the caver and has an interface to attempt moves

require_once "Direction.php";
require_once "Cave.php";

class Caver {
  private $direction;
  private $coordinates;

  public function __construct($x_coordinate, $y_coordinate, $direction) {
    $this->coordinates = array("x" => $x_coordinate, "y" => $y_coordinate );
    if(Direction::isValidValue($direction)){
      $this->direction = $direction;
    }
    else {
      throw new Exception("Invalid Direction", 1);
    }
  }

  public function moveForward() {
    switch ($this->direction) {
      case Direction::North:
        $this->coordinates["y"] += 1;
        break;
      case Direction::East:
        $this->coordinates["x"] += 1;
        break;
      case Direction::South:
        $this->coordinates["y"] -= 1;
        break;
      case Direction::West:
        $this->coordinates["x"] -= 1;
        break;
      default:
        throw new Exception("Invalid Direction State...", 1);
        break;
    }
  }

  public function turnLeft() {
    $this->direction = Direction::left($this->direction);
  }

  public function turnRight() {
    $this->direction = Direction::right($this->direction);
  }

  public function isDead() {
    return Cave::isOutOfBounds($this->coordinates);
  }

  public function getCoordinates() {
    return $this->coordinates;
  }

  public function __toString() {
    $x = $this->coordinates["x"];
    $y = $this->coordinates["y"];
    $direction = Direction::singleCharRepresentation($this->direction);

    $caverAliveStatus = "ALIVE";
    if ($this->isDead()) {
      $caverAliveStatus = "DEAD";
    }
    return "({$x},{$y}){$direction} {$caverAliveStatus}";
  }
}
?>