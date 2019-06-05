<?php

namespace ZWay\Devices;

use ZWay\Commands\Device\ExactCommand;

class Thermostat extends SwitchBinary
{
    const TYPE_NAME = 'thermostat';

    public function setTemperature(int $temperature)
    {
        $command = new ExactCommand($this->id);
        $command->setApi($this->api);
        $command->set($temperature);
        return $command->send();
    }
}