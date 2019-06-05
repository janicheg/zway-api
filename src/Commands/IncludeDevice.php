<?php

namespace ZWay\Commands;


class IncludeDevice extends BaseCommand
{
    public function startInclude()
    {
        return $this->run('controller.AddNodeToNetwork(1)');
    }

    public function endInclude()
    {
        return $this->run('controller.AddNodeToNetwork(0)');
    }
}