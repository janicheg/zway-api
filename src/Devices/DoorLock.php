<?php

namespace ZWay\Devices;

use ZWay\Commands\Device\CloseCommand;
use ZWay\Commands\Device\OpenCommand;

class DoorLock extends BaseDevice
{
    const TYPE_NAME = 'doorlock';

    public function open()
    {
        $command = new OpenCommand($this->id, $this->api);
        return $command->open();
    }

    public function close()
    {
        $command = new CloseCommand($this->id, $this->api);
        return $command->close();
    }

}