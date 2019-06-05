<?php

namespace ZWay\Commands;


class RemoveDevice extends BaseCommand
{
    protected $endpoint = '/ZWaveAPI';

    public function startRemove()
    {
        $this->endpoint = $this->endpoint . '/Run/controller.RemoveNodeFromNetwork(1)';
        return $this;
    }
    public function endRemove()
    {
        $this->endpoint = $this->endpoint . '/Run/controller.RemoveNodeFromNetwork(0)';
        return $this;
    }
}