<?php

namespace Behavior;

use Utils\DanceConfig;

abstract class DanceAction implements NightClubAction
{
    protected string $styleName;
    protected array $danceElements = [];

    public function getDanceDescription(): string
    {
        $result = '';
        foreach ($this->danceElements as $bodyPart => $actions) {
            $result .= $bodyPart . ': ';
            foreach ($actions as $action) {
                $result .= ' ' . $action;
            }
            $result .= PHP_EOL;
        }
        return $result;
    }

    public function getDancingInfo(): string
    {
        return 'Dancing ' . $this->styleName . PHP_EOL . $this->getDanceDescription();
    }

    public function whatDoing(): string
    {
        return $this->getDancingInfo();
    }

    public function __construct()
    {
        $this->danceElements = DanceConfig::getDanceElements(static::class);
    }
}