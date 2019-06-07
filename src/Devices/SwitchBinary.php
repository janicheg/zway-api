<?php

namespace ZWay\Devices;

use ZWay\Commands\Device\OffCommand;
use ZWay\Commands\Device\OnCommand;

class SwitchBinary extends BaseDevice
{
    const TYPE_NAME = 'switchBinary';

    public function turnOn()
    {
        $command = new OnCommand($this->id, $this->api);
        return $command->on();
    }

    public function turnOff()
    {
        $command = new OffCommand($this->id, $this->api);
        return $command->off();
    }
}