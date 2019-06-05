<?php

namespace ZWay\Commands\Device;

class OffCommand extends BaseDeviceCommand
{
    public function off()
    {
        return $this->send($this->endpoint . '/off');
    }
}
