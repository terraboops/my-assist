<?php
  //MAIN EXECUTION LOOP
  require_once "ConsoleViewController.php";

  $viewController = new ConsoleViewController();

  $continue = true;

  while($continue) {
    $input = $viewController->getNextInput();
    $commandSequence = $viewController->parseInputToCommandSequence($input);
    if($viewController->isCaverInitialized()) {
      if(is_array($commandSequence)) {
        foreach ($commandSequence as $index => $command) {
          $caverStillAlive = $viewController->executeCommand($command);
          if(!$caverStillAlive) {
            $viewController->caverDied();
            $continue = false;
            break;
          }
        }
      }
      else {
        $viewController->invalidCommand();
      }
    }
    else {
      $viewController->invalidCommand("No caver");
    }
    echo "Caver Status: " . $viewController->reportCaverStatus() . "\n";
  }
?>