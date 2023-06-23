<?php

namespace Service;

use Entity\Music\Music;
use SplObjectStorage;
use SplObserver;
use SplSubject;

class DanceFloor implements SplSubject
{
    private SplObjectStorage $observers;
    private SplObjectStorage $musicList;
    private Music $currentMusic;

    /**
     * @param SplObjectStorage $nightClubVisitors
     * @param SplObjectStorage $musicList
     */
    public function __construct(SplObjectStorage $nightClubVisitors, SplObjectStorage $musicList)
    {
        $this->observers = $nightClubVisitors;
        $this->musicList = $musicList;
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        /** @var SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * @return Music
     */
    public function getCurrentMusic(): Music
    {
        return $this->currentMusic;
    }

    public function startParty()
    {
        /** @var Music $music */
        foreach ($this->musicList as $music) {
            $this->currentMusic = $music;
            echo 'Now playing: ' . $this->currentMusic->getName()
                . ' music genre: ' . $this->currentMusic->getGenre()->getName()
                . PHP_EOL;
            $this->notify();
        }
    }
}