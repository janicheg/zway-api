<?php

namespace ZWay\Commands;

class ThermostatCommand extends BaseCommand
{
    public function set(\string $id, \int $level)
    {
        $this->endpoint = $this->endpoint . '/' . $id . '/command' . '/exact?level=' . $level;

        return $this;
    }
}
