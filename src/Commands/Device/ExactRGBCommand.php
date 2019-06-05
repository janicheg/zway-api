<?php

namespace ZWay\Commands\Device;

class ExactRGBCommand extends BaseDeviceCommand
{
    public function set(int $red, int $green, int $blue)
    {
        $this->endpoint = $this->endpoint . '/exact?red=' . $red . '&greed=' . $green . '&blue=' . $blue;

        return $this;
    }
}
