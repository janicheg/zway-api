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
    protected $probeTitle;
    /** @var string|null */
    protected $scaleTitle;
    /** @var string|null */
    protected $level;
    /** @var string|null */
    protected $icon;
    /** @var string|null */
    protected $title;
    /** @var string|null */
    protected $text;

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