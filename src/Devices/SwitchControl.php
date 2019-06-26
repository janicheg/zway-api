<?php

namespace ZWay\Devices;

use ZWay\Commands\Device\DownstartCommand;
use ZWay\Commands\Device\DownstopCommand;
use ZWay\Commands\Device\ExactCommand;
use ZWay\Commands\Device\UpstartCommand;
use ZWay\Commands\Device\UpstopCommand;

class SwitchControl extends SwitchBinary
{
    const TYPE_NAME = 'switchControl';

    /**
     * @param int $value
     * @return \ZWay\Responses\Response
     */
    public function set(int $value)
    {
        return (new ExactCommand($this->id, $this->api))->set($value);
    }

    /**
     * @return \ZWay\Responses\Response
     */
    public function downstart()
    {
        return (new DownstartCommand($this->id, $this->api))->downstart();
    }

    /**
     * @return \ZWay\Responses\Response
     */
    public function downstop()
    {
        return (new DownstopCommand($this->id, $this->api))->downstop();
    }

    /**
     * @return \ZWay\Responses\Response
     */
    public function upstart()
    {
        return (new UpstartCommand($this->id, $this->api))->upstart();
    }

    /**
     * @return \ZWay\Responses\Response
     */
    public function upstop()
    {
        return (new UpstopCommand($this->id, $this->api))->upstop();
    }
}