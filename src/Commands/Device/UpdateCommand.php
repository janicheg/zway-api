<?php

namespace ZWay\Commands\Device;

class UpdateCommand extends BaseDeviceCommand
{
    public function update()
    {
        $this->endpoint = $this->endpoint . '/update';
        return $this;
    }
}
