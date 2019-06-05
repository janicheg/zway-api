<?php

namespace ZWay\Commands\Device;

class ExactCommand extends BaseDeviceCommand
{
    public function set(int $level)
    {
        return $this->send($this->endpoint . '/exact?level=' . $level);
    }
}
