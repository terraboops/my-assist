<?php
// Cave [Abstract Model]
// Defines boundaries of legal moves within rectangular cave, can validate a Caver

abstract class Cave {
  const CAVE_BOUND_X_MIN = 0;
  const CAVE_BOUND_Y_MIN = 0;
  const CAVE_BOUND_X_MAX = 20;
  const CAVE_BOUND_Y_MAX = 16;

  public static function isOutOfBounds($coordinate) {
    
    $x = $coordinate["x"];
    $y = $coordinate["y"];
    
    $isOutOfBounds = false;
    
    if($x > self::CAVE_BOUND_X_MAX || $x < self::CAVE_BOUND_X_MIN) {
      $isOutOfBounds = true;
    }
    if($y > self::CAVE_BOUND_Y_MAX || $y < self::CAVE_BOUND_Y_MIN) {
      $isOutOfBounds = true;
    }

    return $isOutOfBounds;
  }
}
?>