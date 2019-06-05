<?php

namespace ZWay\Commands\Device;

class OffCommand extends BaseDeviceCommand
{
    public function off()
    {
        $this->endpoint = $this->endpoint . '/off';
        return $this;
    }
}
