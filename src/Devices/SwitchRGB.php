<?php

namespace ZWay\Devices;

use ZWay\Commands\Device\ExactRGBCommand;

class SwitchRGB extends SwitchBinary
{
    const TYPE_NAME = 'switchRGB';

    public function setTemperature(int $red, int $green, int $blue)
    {
        $command = new ExactRGBCommand($this->id, $this->api);
        return $command->set($red, $green, $blue);
    }
}