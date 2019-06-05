<?php

namespace ZWay\Commands\Device;

class ExactCommand extends BaseDeviceCommand
{
    public function set(int $level)
    {
        $this->endpoint = $this->endpoint . '/exact?level=' . $level;

        return $this;
    }
}
