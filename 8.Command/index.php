<?php 
interface Command {
    function execute();
}

class Television {
    public function turnOn() {
        echo "Television turn on";
    }
    public function turnOff() {
        echo "Television turn off";
    }
}

class PowerOnCommand implements Command {
    private $tv;
    public function __construct(Television $tv) {
        $this->tv = $tv;
    }
    public function execute() {
        $this->tv->turnOn();
    }
}
class RemoteControl {
    private $command;
    public function setCommand(Command $command) {
        $this->command = $command;
    }
    public function pressButton() 
    {
        $this->command->execute();       
    }
}
$tv = new Television();
$remote = new RemoteControl();
$powerOnCommand = new PowerOnCommand($tv);
$remote->setCommand($powerOnCommand);
$remote->pressButton();