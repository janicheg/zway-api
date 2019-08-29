<?php

namespace ZWay\Commands;


class Notifications extends BaseCommand
{
    protected $endpoint = '/ZAutomation/api/v1';

    public function get($since)
    {
        return $this->send(
            $this->endpoint = $this->endpoint . '/notifications?since=' . $since
        );
    }
}