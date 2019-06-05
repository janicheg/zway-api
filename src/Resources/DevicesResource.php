<?php

namespace ZWay\Resources;

use ZWay\Api\ApiService;

class DevicesResource extends BaseResource
{
    protected $endpoint = '/ZAutomation/api/v1/devices';

    /**
     * DevicesResource constructor.
     * @param ApiService $api
     * @param null $since
     */
    public function __construct(ApiService $api, $since = null)
    {
        if ($since) {
            $this->endpoint = $this->endpoint . '?since=' . $since;
        }
        parent::__construct($api);
    }


}
