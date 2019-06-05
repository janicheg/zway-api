<?php

namespace ZWay\Commands\Device;

class CloseCommand extends BaseDeviceCommand
{
    public function close()
    {
        $this->endpoint = $this->endpoint . '/close';
        return $this;
    }
}
