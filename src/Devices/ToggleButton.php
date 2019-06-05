<?php

namespace ZWay\Devices;

use ZWay\Commands\Device\OnCommand;

class ToggleButton extends BaseDevice
{
    const TYPE_NAME = 'thermostat';

    public function turnOn()
    {
        $command = new OnCommand($this->id);
        $command->setApi($this->api);
        $command->on();
        return $command->send();
    }
}