<?php

namespace Behavior;

class DrinkAction implements NightClubAction
{
    function whatDoing(): string
    {
        return "Staying in bar and drinking vodka" . PHP_EOL;
    }
}