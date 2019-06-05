<?php

namespace ZWay\Commands\Device;

class UpstartCommand extends BaseDeviceCommand
{
    public function upstart()
    {
        $this->endpoint = $this->endpoint . '/upstart';
        return $this;
    }
}
