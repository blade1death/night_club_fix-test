<?php

namespace Behavior;

class DrinkAction implements NightClubAction
{
    function whatDoing(): string
    {
        return "Стоит в баре и пьет водку" . PHP_EOL;
    }
}