<?php

namespace ZWay\Commands;


class SecureInclusion extends BaseCommand
{
    public function enable()
    {
        return $this->run('controller.data.secureInclusion=false');
    }

    public function disable()
    {
        return $this->run('controller.data.secureInclusion=true');
    }
}