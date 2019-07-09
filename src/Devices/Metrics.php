<?php

namespace ZWay\Devices;

/**
 * Class Metrics
 * @package ZWay\Devices
 */
class Metrics
{
    use CloneTrait;

    /** @var string|null */
    public $probeTitle;
    /** @var string|null */
    public $scaleTitle;
    /** @var string|null */
    public $level;
    /** @var string|null */
    public $icon;
    /** @var string|null */
    public $title;
    /** @var string|null */
    public $text;

    /**
     * Metrics constructor.
     * @param null|string $probeTitle
     */
    public function __construct(\stdClass $class)
    {
        $this->implement($class);
    }

    /**
     * @return null|string
     */
    public function getProbeTitle()
    {
        return $this->probeTitle;
    }

    /**
     * @return null|string
     */
    public function getScaleTitle()
    {
        return $this->scaleTitle;
    }

    /**
     * @return null|string
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return null|string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return null|string
     */
    public function getText()
    {
        return $this->text;
    }
}