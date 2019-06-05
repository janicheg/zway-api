<?php

namespace ZWay\Devices;

use ZWay\Commands\Device\OffCommand;
use ZWay\Commands\Device\OnCommand;

class SwitchBinary extends BaseDevice
{
    const TYPE_NAME = 'switchBinary';

    public function turnOn()
    {
        $command = new OnCommand($this->id);
        $command->setApi($this->api);
        $command->on();
        return $command->send();
    }

    public function turnOff()
    {
        $command = new OffCommand($this->id);
        $command->setApi($this->api);
        $command->off();
        return $command->send();
    }
}