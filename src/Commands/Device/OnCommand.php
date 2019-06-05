<?php

namespace ZWay\Commands\Device;

class OnCommand extends BaseDeviceCommand
{
    public function on()
    {
        $this->endpoint = $this->endpoint . '/on';
        return $this;
    }
}
