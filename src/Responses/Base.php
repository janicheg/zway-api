<?php

namespace ZWay\Responses;

/**
 * Class Command
 * @package ZWay\Responses
 */
class Base extends BaseResponse
{
    public function handle()
    {
        return $this;
    }
}
