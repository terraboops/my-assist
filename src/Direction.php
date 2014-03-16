<?php
//Direction [Abstract Model]
//Defines legal directions and how to move between them

require_once "lib/basicenum.php";

//SplEnum would have been better to extend from, but my environment was not configured with this class so I opted for a quick solution
//www.php.net/manual/en/class.splenum.php
abstract class Direction extends BasicEnum { 
  const North = 0;
  const East = 1;
  const South = 2;
  const West = 3;

  //Define the bounds of a 360 turn... ie: when you turn left while facing north, you"re now facing west
  const MAX_DIRECTION = self::West;
  const MIN_DIRECTION = self::North;

  public static function right($direction) {
    if (self::isValidValue($direction)) {
      $direction += 1;
      return $direction <= self::MAX_DIRECTION ? $direction : self::MIN_DIRECTION;
    }
    else {
      return false;
    }
  }

  public static function left($direction) {
    if (self::isValidValue($direction)) {
      $direction -= 1;
      return $direction >= self::MIN_DIRECTION ? $direction : self::MAX_DIRECTION;
    }
    else {
      return false;
    }
  }

  //This is provided for convenience, largely because I had to use BasicEnum
  public static function singleCharRepresentation($direction) {
    switch ($direction) {
      case Direction::North:
        return "N";
      case Direction::East:
        return "E";
      case Direction::South:
        return "S";
      case Direction::West:
        return "W";
      default:
        throw new Exception("Illegal Direction", 1);
        break;
    }
  }
}
?>