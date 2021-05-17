<?php

namespace ZWay\Devices;

use ZWay\Commands\Device\ExactCommand;

class SwitchMultilevel extends SwitchBinary
{
    const TYPE_NAME = 'switchMultilevel';

    public function setTemperature(int $temperature)
    {
        $command = new ExactCommand($this->id, $this->api);
        return $command->set($temperature);
    }
}