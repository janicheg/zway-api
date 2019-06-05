<?php

namespace ZWay\Commands\Device;

class DownstartCommand extends BaseDeviceCommand
{
    public function downstart()
    {
        $this->endpoint = $this->endpoint . '/downstart';
        return $this;
    }
}
