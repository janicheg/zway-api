<?php

namespace ZWay\Commands;

use ZWay\Api\ApiService;
use ZWay\Responses\Response;
use ZWay\ResponseTransformer;

abstract class BaseCommand
{
    /** @var ApiService */
    protected $api;

    protected $endpoint = '/ZWaveAPI';
    protected $hidden = ['api'];
    protected $responseType;
    protected $transformer;
    protected $transformerType;

    public function __construct($api = null)
    {
        $this->api = $api;
        $this->transformer = new ResponseTransformer();
        $this->transformerType = str_replace('Command', 'Response', get_class($this));
    }

    public function setApi(ApiService $api)
    {
        $this->api = $api;
    }

    public function run($command)
    {
        return $this->send(
            $this->endpoint . '/Run/' . $command
        );
    }

    /**
     * @return Response
     */
    public function send($url = null)
    {
        $response = $this->api->get($url ?? $this->endpoint);

        return $this->transformer->setResponse($response)->transform($this->transformerType);
    }

    /**
     * @param $path
     * @return Response
     */
    public function sendPath($path)
    {
        $response = $this->api->get($this->endpoint . $path);

        return $this->transformer->setResponse($response)->transform($this->transformerType);
    }

}
