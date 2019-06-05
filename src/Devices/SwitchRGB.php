<?php

namespace ZWay\Devices;

use ZWay\Commands\Device\ExactRGBCommand;

class SwitchRGB extends SwitchBinary
{
    const TYPE_NAME = 'switchRGB';

    public function setTemperature(int $red, int $green, int $blue)
    {
        $command = new ExactRGBCommand($this->id);
        $command->setApi($this->api);
        $command->set($red, $green, $blue);
        return $command->send();
    }
}