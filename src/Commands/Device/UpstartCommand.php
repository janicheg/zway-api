<?php

namespace ZWay\Commands\Device;

class UpstartCommand extends BaseDeviceCommand
{
    public function upstart()
    {
        return $this->send($this->endpoint . '/upstart');
    }
}
