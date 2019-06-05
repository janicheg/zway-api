<?php

namespace ZWay\Commands\Device;

class CloseCommand extends BaseDeviceCommand
{
    public function close()
    {
        return $this->send($this->endpoint . '/close');
    }
}
