<?php

namespace ZWay\Commands\Device;

class DownstartCommand extends BaseDeviceCommand
{
    public function downstart()
    {
        return $this->send($this->endpoint . '/downstart');
    }
}
