<?php

namespace ZWay\Commands\Device;

class UpdateCommand extends BaseDeviceCommand
{
    public function update()
    {
        return $this->send($this->endpoint . '/update');
    }
}
