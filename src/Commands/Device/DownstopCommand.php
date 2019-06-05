<?php

namespace ZWay\Commands\Device;

class DownstopCommand extends BaseDeviceCommand
{
    public function downstop()
    {
        return $this->send($this->endpoint . '/downstop');
    }
}
