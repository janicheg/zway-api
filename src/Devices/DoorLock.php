<?php

namespace ZWay\Devices;

use ZWay\Commands\Device\CloseCommand;
use ZWay\Commands\Device\OpenCommand;

class DoorLock extends BaseDevice
{
    const TYPE_NAME = 'doorlock';

    public function open()
    {
        $command = new OpenCommand($this->id);
        $command->setApi($this->api);
        $command->open();
        return $command->send();
    }

    public function close()
    {
        $command = new CloseCommand($this->id);
        $command->setApi($this->api);
        $command->close();
        return $command->send();
    }

}