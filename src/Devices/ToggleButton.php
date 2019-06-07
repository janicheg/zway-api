<?php

namespace ZWay\Devices;

use ZWay\Commands\Device\OnCommand;

class ToggleButton extends BaseDevice
{
    const TYPE_NAME = 'thermostat';

    public function turnOn()
    {
        $command = new OnCommand($this->id, $this->api);
        return $command->on();
    }
}