<?php

namespace Service;

use Entity\Song;
use SplObjectStorage;
use SplObserver;
use SplSubject;

class DanceFloor implements SplSubject
{
    private SplObjectStorage $observers;
    private SplObjectStorage $musicList;
    private Song $currentMusic;

    /**
     * @param SplObjectStorage $nightClubVisitors
     * @param SplObjectStorage $musicList
     */
    public function __construct(SplObjectStorage $nightClubVisitors, SplObjectStorage $musicList)
    {
        $this->observers = $nightClubVisitors;
        $this->musicList = $musicList;
    }

    public function attach(SplObserver $observer):void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer):void
    {
        $this->observers->detach($observer);
    }

    public function notify():void
    {
        /** @var SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * @return Song
     */
    public function getCurrentMusic(): Song
    {
        return $this->currentMusic;
    }

    public function startParty()
    {
        /** @var Song $music */
        foreach ($this->musicList as $music) {
            $this->currentMusic = $music;
            echo 'Сейчас играет: ' . $this->currentMusic->getName()
                . 'музыкальный жанр: ' . $this->currentMusic->getGenre()->getName()
                . PHP_EOL;
            $this->notify();
        }
    }
}