<?php

namespace ZWay\Commands\Device;

class OnCommand extends BaseDeviceCommand
{
    public function on()
    {
        return $this->send($this->endpoint . '/on');
    }
}
