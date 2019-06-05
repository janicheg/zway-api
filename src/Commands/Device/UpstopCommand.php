<?php

namespace ZWay\Commands\Device;

class UpstopCommand extends BaseDeviceCommand
{
    public function upstop()
    {
        return $this->send($this->endpoint . '/upstop');
    }
}
