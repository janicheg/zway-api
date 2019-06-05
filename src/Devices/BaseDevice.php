<?php

namespace ZWay\Devices;

use ZWay\Api\ApiService;
use ZWay\ResponseTransformer;

abstract class BaseDevice
{
    /** @var ApiService */
    protected $api;

    protected $id;
    protected $endpoint;
    protected $hidden = ['api'];
    protected $responseType;
    protected $transformer;
    protected $transformerType;

    public function __construct(string $id)
    {
        $this->id = $id;
        $this->transformer = new ResponseTransformer();
        $this->transformerType = str_replace('Resource', 'Response', get_class($this));
    }

    public function setApi(ApiService $api)
    {
        $this->api = $api;
    }


}