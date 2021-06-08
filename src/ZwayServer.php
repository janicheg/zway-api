<?php

namespace ZWay;

use ZWay\Api\ApiService;
use ZWay\Devices\BaseDevice;
use ZWay\Devices\DoorLock;
use ZWay\Devices\SensorBinary;
use ZWay\Devices\SensorMultilevel;
use ZWay\Devices\SwitchBinary;
use ZWay\Devices\SwitchControl;
use ZWay\Devices\SwitchRGB;
use ZWay\Devices\Thermostat;
use ZWay\Devices\ToggleButton;
use ZWay\Devices\SwitchMultilevel;
use ZWay\Resources\DevicesResource;

class ZwayServer
{
    /** @var ApiService */
    protected $api;

    /** @var BaseDevice[] */
    protected $devices;
    /** @var string|null */
    protected $deviceSince;

    public function __construct($clientId, $clientSecret)
    {
        $this->api = new ApiService($clientId, $clientSecret);
    }

    /**
     * @param string $token
     */
    public function setToken($token): void
    {
        $this->api->setToken($token);
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->api->getToken();
    } 

    public function getDevice(\stdClass $data): BaseDevice
    {
        if (!isset($data->deviceType)) {
            throw new \BadMethodCallException('data must include deviceType string');
        }
        switch ($data->deviceType) {
            case Thermostat::TYPE_NAME:
                $device = new Thermostat($data);
                break;
            case DoorLock::TYPE_NAME:
                $device = new DoorLock($data);
                break;
            case SensorBinary::TYPE_NAME:
                $device = new SensorBinary($data);
                break;
            case SwitchBinary::TYPE_NAME:
                $device = new SwitchBinary($data);
                break;
            case SensorMultilevel::TYPE_NAME:
                $device = new SensorMultilevel($data);
                break;
            case SwitchControl::TYPE_NAME:
                $device = new SwitchControl($data);
                break;
            case SwitchRGB::TYPE_NAME:
                $device = new SwitchRGB($data);
                break;
            case ToggleButton::TYPE_NAME:
                $device = new ToggleButton($data);
                break;
            case SwitchMultilevel::TYPE_NAME:
                $device = new SwitchControl($data);
                break;
            default:
                $device = new BaseDevice($data);
                break;
        }
        $device->setApi($this->api);
        if (isset($data->metrics)) {
            $device->setMetrics($data->metrics);
        }

        return $device;
    }

    public function getDevices($since = null)
    {
        if ($since) {
            $this->deviceSince = $since;
        }
        $resource = new DevicesResource($this->api, $this->deviceSince);
        $response = $resource->send()->getContent();
        if ($response->code === 200) {
            $data = $response->data;
            $this->deviceSince = $data->updateTime;
            if ($data->structureChanged == true) {
                foreach ($data->devices as $deviceData) {
                    $this->devices[] = $this->getDevice($deviceData);
                }
            }
        }

        return $this->devices;
    }

    public function getAllDevices()
    {
        $resource = new DevicesResource($this->api, $this->deviceSince);
        $response = $resource->send()->getContent();
        if ($response->code === 200) {
            $data = $response->data;
            foreach ($data->devices as $deviceData) {
                $this->devices[] = $this->getDevice($deviceData);
            }
        }

        return $this->devices;
    }
    
    public function getApi()
    {
        return $this->api;
    }
}