<?php

namespace ZWay\Commands;


class Notifications extends BaseCommand
{
    protected $endpoint = '/ZAutomation/api/v1';

    public function get($since)
    {
        $this->endpoint = $this->endpoint . '/notifications?since=' . $since;
        return $this;
    }
}