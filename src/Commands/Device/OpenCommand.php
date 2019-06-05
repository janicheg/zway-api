<?php

namespace ZWay\Commands\Device;

class OpenCommand extends BaseDeviceCommand
{
    public function open()
    {
        $this->endpoint = $this->endpoint . '/open';
        return $this;
    }
}
