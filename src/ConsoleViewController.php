<?php
// ConsoleViewController [Controller]
// Accepts commands from the view, moves Caver through Cave and reports back

require_once "Caver.php";
require_once "ConsoleView.php";

class ConsoleViewController
{
  const Input = "php://stdin";
  //Legal Commands
  const Forward = "M";
  const Left = "L";
  const Right = "R";

  private $caver;
  private $consoleView;

  public function __construct($showOutput = true) {
    $this->consoleView = new ConsoleView($showOutput);
  }

  public function getNextInput() {
    $this->consoleView->showOutput("Please enter valid command sequence:\n");
    return $this->consoleView->getInput(fopen(self::Input,"r"));
  }

  public function isCaverInitialized() {
    return isset($this->caver);
  }

  public function reportCaverStatus() {
    return (string)$this->caver;
  }

  public function invalidCommand($reason = false) {
    $default = "Invalid command sequence";
    $error = $reason ? $default . ": " . $reason : $default;
    $this->consoleView->showOutput($error . "\n");
  }

  public function caverDied() {
    $this->consoleView->showOutput("The caver has died.\n");
  }

  public function parseInputToCommandSequence($input) {
    $split_input = explode(" ", $input);
    $output = false;

    if($this->isValidCaverInitString($split_input[0])) {
      if($this->isCaverInitialized()) {
        $output = false; //attempt to re-initialize caver
      }
      else {
        $caverInitString = array_shift($split_input);
        $this->initCaver($caverInitString);
      }
    }

    $commandString = implode("", $split_input);
    if($this->isValidCommandString($commandString)) {
      if(empty($commandString)) {
        $output = array();
      }
      else {
        $output = str_split($commandString);
      }
    }
    else {
      $output = false; //invalid command sequence
    }
    return $output;
  }

  public function executeCommand($command) {
    if(isset($this->caver)) {    
      switch ($command) {
        case self::Forward:
          $this->caver->moveForward();
          break;
        case self::Left:
          $this->caver->turnLeft();
          break;
        case self::Right:
          $this->caver->turnRight();
          break;
        default:
          throw new Exception("Invalid command attempted");
          break;
      }
      //Check if command killed caver, return alive status
      if ($this->caver->isDead()) {
        return false;
      }
      else {
        return true;
      }
    }
    else {
      throw new Exception("Caver must be initialized before executing commands", 1);
    }
  }

  private function initCaver($caverInitString) {
    preg_match("/\((\d+),(\d+)\)([NESW])/", $caverInitString, $caverValues);

    $direction = $this->stringToDirection($caverValues[3]);
    if(count($caverValues)>0) {
      $this->caver = new Caver($caverValues[1], $caverValues[2], $direction);
    }
    else {
      throw new Exception("Invalid Caver Init String.", 1);
    }
  }

  private function stringToDirection($string) {
    $direction = false;
    switch ($string) {
      case "N":
        $direction = Direction::North;
        break;
      case "E":
        $direction = Direction::East;
        break;
      case "S":
        $direction = Direction::South;
        break;
      case "W":
        $direction = Direction::West;
        break;
      default:
        //Invalid direction
        break;
    }
    return $direction;
  }

  //Valid commands: M, L, R
  private function isValidCommandString($input) {
    return preg_match("/^[MLR]*$/", $input);
  }

  //Valid init format ({int},{int}){Direction}
  private function isValidCaverInitString($input) {
    return preg_match("/^\(\d+,\d+\)[NESW]$/", $input);
  }

}
?>