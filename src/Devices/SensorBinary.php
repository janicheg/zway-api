<?php

namespace ZWay\Devices;

use ZWay\Commands\Device\UpdateCommand;

class SensorBinary extends BaseDevice
{
    const TYPE_NAME = 'sensorBinary';

    public function update()
    {
        $command = new UpdateCommand($this->id, $this->api);
        return $command->update();
    }

}