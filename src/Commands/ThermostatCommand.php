<?php

namespace ZWay\Commands;

class ThermostatCommand extends BaseCommand
{
    public function __construct($id)
    {
        $this->endpoint = $this->endpoint . '/' . $id . '/command';
        parent::__construct();
    }

    public function set(int $level)
    {
        $this->endpoint = $this->endpoint . '/exact?level=' . $level;

        return $this;
    }
}
