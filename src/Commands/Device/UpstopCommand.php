<?php

namespace ZWay\Commands\Device;

class UpstopCommand extends BaseDeviceCommand
{
    public function upstop()
    {
        $this->endpoint = $this->endpoint . '/upstop';
        return $this;
    }
}
