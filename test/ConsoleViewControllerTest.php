<?php
class ConsoleViewControllerTest extends PHPUnit_Framework_TestCase
{
    public function testIsCaverInitializedFalse() {
      $viewController = new ConsoleViewController(false);
      $this->assertFalse($viewController->isCaverInitialized());
    }
    public function testIsCaverInitializedTrue() {
      $viewController = new ConsoleViewController(false);
      $viewController->parseInputToCommandSequence("(1,1)N");
      $this->assertTrue($viewController->isCaverInitialized());
    }
    public function testReportCaverStatus() {
      $viewController = new ConsoleViewController(false);
      $viewController->parseInputToCommandSequence("(1,1)N");
      $control = new Caver(1,1,Direction::North);
      $this->assertEquals((string)$control, $viewController->reportCaverStatus());
    }
    public function testParseInputCommandSequenceInitOnly() {
      $viewController = new ConsoleViewController(false);
      $commandSequence = $viewController->parseInputToCommandSequence("(1,1)N");
      $this->assertEquals(0, count($commandSequence));
    }
    public function testParseInputCommandSequenceInitAndCommands() {
      $viewController = new ConsoleViewController(false);
      $commandSequence = $viewController->parseInputToCommandSequence("(1,1)N MMM");
      $this->assertEquals(3, count($commandSequence));
    }
    public function testParseInputCommandSequenceWithoutInit() {
      $viewController = new ConsoleViewController(false);
      $commandSequence = $viewController->parseInputToCommandSequence("MMM");
      $this->assertEquals(3, count($commandSequence));
    }
    public function testParseInputCommandSequenceInvalid1() {
      $viewController = new ConsoleViewController(false);
      $commandSequence = $viewController->parseInputToCommandSequence("(-1,-1)S MMMM");
      $this->assertFalse($commandSequence);
    }
    public function testParseInputCommandSequenceInvalid2() {
      $viewController = new ConsoleViewController(false);
      $commandSequence = $viewController->parseInputToCommandSequence("(1,1)A");
      $this->assertFalse($commandSequence);
    }
    public function testParseInputCommandSequenceInvalid3() {
      $viewController = new ConsoleViewController(false);
      $commandSequence = $viewController->parseInputToCommandSequence("(1,1)S LRF");
      $this->assertFalse($commandSequence);
    }
    public function testParseInputCommandSequenceInvalid4() {
      $viewController = new ConsoleViewController(false);
      $commandSequence = $viewController->parseInputToCommandSequence("TOTALLY WRONG");
      $this->assertFalse($commandSequence);
    }
    public function testParseInputCommandSequenceInvalid5() {
      $viewController = new ConsoleViewController(false);
      $commandSequence = $viewController->parseInputToCommandSequence("1,1 S");
      $this->assertFalse($commandSequence);
    }
    public function testExecuteCommandForward(){
      $viewController = new ConsoleViewController(false);
      $control = new Caver(1,0,Direction::South);
      
      $commandSequence = $viewController->parseInputToCommandSequence("(1,1)S");
      $viewController->executeCommand(ConsoleViewController::Forward);
      
      $this->assertEquals((string)$control, $viewController->reportCaverStatus());
    }
    public function testExecuteCommandLeft(){
      $viewController = new ConsoleViewController(false);
      $control = new Caver(1,1,Direction::East);
      
      $commandSequence = $viewController->parseInputToCommandSequence("(1,1)S");
      $viewController->executeCommand(ConsoleViewController::Left);
      
      $this->assertEquals((string)$control, $viewController->reportCaverStatus());
    }
    public function testExecuteCommandRight(){
      $viewController = new ConsoleViewController(false);
      $control = new Caver(1,1,Direction::West);
      
      $commandSequence = $viewController->parseInputToCommandSequence("(1,1)S");
      $viewController->executeCommand(ConsoleViewController::Right);
      
      $this->assertEquals((string)$control, $viewController->reportCaverStatus());
    }

    /**
     * @expectedException Exception
     */
    public function testExecuteCommandInvalid(){
      $viewController = new ConsoleViewController(false);
      
      $commandSequence = $viewController->parseInputToCommandSequence("(1,1)S");
      $viewController->executeCommand('F');
    }

    /**
     * @expectedException Exception
     */
    public function testExecuteCommandNoCaver(){
      $viewController = new ConsoleViewController(false);
      $viewController->executeCommand(ConsoleViewController::Forward);
    }
}
?>