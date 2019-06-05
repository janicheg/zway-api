<?php

namespace ZWay\Commands;


class IncludeDevice extends BaseCommand
{
    protected $endpoint = '/ZWaveAPI';

    public function startInclude()
    {
        $this->endpoint = $this->endpoint . '/Run/controller.AddNodeToNetwork(1)';
        return $this;
    }
    public function endInclude()
    {
        $this->endpoint = $this->endpoint . '/Run/controller.AddNodeToNetwork(0)';
        return $this;
    }
}