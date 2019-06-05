<?php

namespace ZWay\Commands;

use function PHPSTORM_META\type;

class ToggleButtonCommand extends BaseCommand
{
    public function on(string $id)
    {
        $this->endpoint = $this->endpoint  . '/' . $id . '/command' . '/on';

        return $this;
    }

    public function off(string $id)
    {
        $this->endpoint = $this->endpoint . '/' . $id . '/command' . '/off';

        return $this;
    }
}
