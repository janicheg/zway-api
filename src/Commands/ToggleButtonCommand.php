<?php

namespace ZWay\Commands;

class ToggleButtonCommand extends BaseCommand
{
    public function __construct($id)
    {
        $this->endpoint = $this->endpoint . '/' . $id . '/command';
        parent::__construct();
    }

    public function on()
    {
        $this->endpoint = $this->endpoint . '/on';
        return $this;
    }

    public function off()
    {
        $this->endpoint = $this->endpoint . '/off';
        return $this;
    }
}
