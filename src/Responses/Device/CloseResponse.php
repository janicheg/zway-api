<?php

namespace ZWay\Responses\Device;

use ZWay\Responses\BaseResponse;

class CloseResponse extends BaseResponse
{
    public function handle()
    {
        return $this;
    }
}
