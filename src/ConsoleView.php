<?php
// ConsoleView [View]
// Reads input and feeds valid input to the SpecializedGPSController

class ConsoleView
{
  public function __construct($showOutput) {
    if($showOutput) {
      echo "Specialized GPS initialized...\n";
    }
  }

  public function getInput($resource_handle) {
    $input = fgets($resource_handle);
    return trim($input);
  }

  public function showOutput($output) {
    echo $output;
  }
}
?>