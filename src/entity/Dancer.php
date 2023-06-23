<?php

namespace Entity;

use Service\DanceFloor;
use Behavior\DanceAction;
use Behavior\DrinkAction;
use Behavior\NightClubAction;
use SplObjectStorage;
use SplObserver;
use SplSubject;
use Utils\DanceConfig;

class Dancer implements SplObserver
{
    private string $name;
    private SplObjectStorage $knownDanceStyles;
    private NightClubAction $state;

    /**
     * @param string $name
     * @param DanceAction[] $knownDanceStyles
     */
    public function __construct(string $name, array $knownDanceStyles)
    {
        $this->name = $name;
        $this->knownDanceStyles = new SplObjectStorage();
        //состояние по умолчанию, когда не танцует
        $this->state = new DrinkAction();

        foreach ($knownDanceStyles as $danceStyle) {
            $this->knownDanceStyles->attach($danceStyle);
        }
    }

    public function update(SplSubject $subject):void
    {
        /** @var DanceFloor $subject */
        $currentMusicGenre = $subject->getCurrentMusic()->getGenre();
        $genreAllowedStyles = DanceConfig::getStylesForGenreMap()[get_class($currentMusicGenre)];

        /** @var DanceAction $knownDanceStyle */
        foreach ($this->knownDanceStyles as $knownDanceStyle) {
            if (in_array(get_class($knownDanceStyle), $genreAllowedStyles)) {
                $this->state = $knownDanceStyle;
                break;
            }
        }

        $stateInfo = $this->name . ': ' . $this->state->whatDoing();

        echo $stateInfo;
    }
}