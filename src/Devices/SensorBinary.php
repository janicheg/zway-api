<?php

namespace ZWay\Devices;

use ZWay\Commands\Device\UpdateCommand;

class SensorBinary extends BaseDevice
{
    const TYPE_NAME = 'sensorBinary';

    public function update()
    {
        $command = new UpdateCommand($this->id);
        $command->setApi($this->api);
        $command->update();
        return $command->send();
    }

}