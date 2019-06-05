<?php

namespace ZWay\Commands\Device;

use ZWay\Commands\BaseCommand;

class BaseDeviceCommand extends BaseCommand
{
    protected $id;
    protected $endpoint = '/ZAutomation/api/v1/devices';

    public function __construct($id, $api)
    {
        $this->id = $id;
        $this->endpoint = $this->endpoint . '/' . $id . '/command';
        parent::__construct($api);
    }
}
