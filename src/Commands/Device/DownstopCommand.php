<?php

namespace ZWay\Commands\Device;

class DownstopCommand extends BaseDeviceCommand
{
    public function downstop()
    {
        $this->endpoint = $this->endpoint . '/downstop';
        return $this;
    }
}
