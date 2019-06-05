<?php

namespace ZWay\Commands;

use ZWay\Api\ApiService;
use ZWay\Responses\Response;
use ZWay\Responses\StatusResponse;
use ZWay\ResponseTransformer;

abstract class BaseCommand
{
    /** @var ApiService */
    protected $api;

    protected $endpoint;
    protected $hidden = ['api'];
    protected $responseType;
    protected $transformer;
    protected $transformerType;

    public function __construct()
    {
        $this->transformer = new ResponseTransformer();
        $this->transformerType = str_replace('Command', 'Response', get_class($this));
    }

    public function setApi(ApiService $api)
    {
        $this->api = $api;
    }

    /**
     * @return Response
     */
    public function send()
    {
        $response = $this->api->get($this->endpoint);

        return $this->transformer->setResponse($response)->transform($this->transformerType);
    }
}
