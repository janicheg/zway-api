<?php

namespace ZWay\Devices;

use ZWay\Api\ApiService;
use ZWay\ResponseTransformer;

class BaseDevice
{
    use CloneTrait;
    
    /** @var ApiService */
    protected $api;
    protected $endpoint;
    protected $hidden = ['api'];
    protected $responseType;
    protected $transformer;
    protected $transformerType;

    /** @var string */
    protected $id;
    /** @var string */
    protected $deviceType;
    /** @var integer */
    protected $updateTime;
    /** @var Metrics */
    protected $metrics;
    /** @var integer */
    protected $creationTime;
    /** @var integer */
    protected $creatorId;
    /** @var boolean */
    protected $hasHistory;
    /** @var boolean */
    protected $permanently_hidden;
    /** @var string */
    protected $probeType;
    /** @var boolean */
    protected $visibility;
    /** @var array */
    protected $tags = [];

    public function __construct(\stdClass $data)
    {
        $this->implement($data);
        $this->transformer = new ResponseTransformer();
        $this->transformerType = str_replace('Resource', 'Response', get_class($this));
    }

    public function setApi(ApiService $api)
    {
        $this->api = $api;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDeviceType()
    {
        return $this->deviceType;
    }

    /**
     * @return int
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * @return Metrics
     */
    public function getMetrics()
    {
        return $this->metrics;
    }

    /**
     * @return int
     */
    public function getCreationTime()
    {
        return $this->creationTime;
    }

    /**
     * @return int
     */
    public function getCreatorId()
    {
        return $this->creatorId;
    }

    /**
     * @return bool
     */
    public function isHasHistory()
    {
        return $this->hasHistory;
    }

    /**
     * @return bool
     */
    public function isPermanentlyHidden()
    {
        return $this->permanently_hidden;
    }

    /**
     * @return string
     */
    public function getProbeType()
    {
        return $this->probeType;
    }

    /**
     * @return bool
     */
    public function isVisibility()
    {
        return $this->visibility;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }
    
    public function setMetrics(\stdClass $metricData)
    {
        $this->metrics = new Metrics($metricData);
    }
}