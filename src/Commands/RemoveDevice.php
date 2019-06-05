<?php

namespace ZWay\Commands;


class RemoveDevice extends BaseCommand
{
    public function startRemove()
    {
        return $this->run('controller.RemoveNodeFromNetwork(1)');
    }

    public function endRemove()
    {
        return $this->run('controller.RemoveNodeFromNetwork(0)');
    }
}