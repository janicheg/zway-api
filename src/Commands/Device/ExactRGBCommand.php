<?php

namespace ZWay\Commands\Device;

class ExactRGBCommand extends BaseDeviceCommand
{
    public function set(int $red, int $green, int $blue)
    {
        return $this->send($this->endpoint . '/exact?red=' . $red . '&greed=' . $green . '&blue=' . $blue);
    }
}
