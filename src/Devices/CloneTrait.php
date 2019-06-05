<?php

namespace ZWay\Devices;

/**
 * Trait CloneTrait
 * @package ZWay\Devices
 */
trait CloneTrait
{
    /**
     * @param \stdClass $class
     */
    public function implement(\stdClass $class)
    {
        foreach ($class as $attribute => $value) {
            if (property_exists($this, $attribute)) {
                $this->$attribute = $value;
            }
        }
    }
}