<?php

namespace ZWay\Devices;

use ZWay\Commands\Device\OnCommand;

class SwitchControl extends Thermostat
{
    const TYPE_NAME = 'switchControl';

    public function turnOn()
    {
        $command = new OnCommand($this->id, $this->api);
        return $command->on();
    }
}