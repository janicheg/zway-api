<?php

namespace ZWay\Commands\Device;

class OpenCommand extends BaseDeviceCommand
{
    public function open()
    {
        return $this->send($this->endpoint . '/open');
    }
}
