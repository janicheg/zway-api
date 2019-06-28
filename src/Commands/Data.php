<?php

namespace ZWay\Commands;


class Data extends BaseCommand
{

    public function getData(int $timestamp = 0)
    {
        return $this->send(
            $this->endpoint . '/Data/' . $timestamp
        );
    }
}