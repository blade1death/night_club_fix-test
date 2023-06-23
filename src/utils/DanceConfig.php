<?php

namespace Utils;

use Behavior\ElectroDance;
use Behavior\Hiphop;
use Behavior\House;
use Behavior\Pop as PopDance;
use Behavior\RAndB as RAndBDance;
use Entity\Music\Electrohouse;
use Entity\Music\Pop;
use Entity\Music\RAndB;

class DanceConfig
{
    private static string $danceConfigPath = 'dance_config';
    private static string $defaultDanceFile = 'dance_config/default_dance.json';

    public static function getDanceElements(string $className): array
    {
        $className = substr($className, strpos($className, '_') + 1);
        $fileName = self::$danceConfigPath . '/' . StringUtils::getDanceConfigFileName($className);
        if (file_exists($fileName)) {
            $danceElements = file_get_contents($fileName);
        } else {
            $danceElements = file_get_contents(self::$defaultDanceFile);
        }

        return json_decode($danceElements, true);
    }

    public static function getStylesForGenreMap(): array
    {
        $map = [];
        $map[RAndB::class] = [Hiphop::class, RAndBDance::class];
        $map[Electrohouse::class] = [ElectroDance::class, House::class];
        $map[Pop::class] = [PopDance::class];

        return $map;
    }
}