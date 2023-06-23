<?php

use Service\DanceFloor;
use Behavior\Hiphop;
use Behavior\House;
use Behavior\Pop as PopDance;
use Entity\Dancer;
use Entity\Electrohouse;
use Entity\Pop;
use Entity\RAndB;
use Entity\Song;


require_once 'vendor/autoload.php';

$trackList = new SplObjectStorage();

$randbTrack = new Song('Some R&B track', new RAndB());
$electroHouseTrack = new Song('Some Electrohouse track', new Electrohouse());
$popTrack = new Song('Some pop track', new Pop());

$trackList->attach($randbTrack);
$trackList->attach($electroHouseTrack);
$trackList->attach($popTrack);

$nightClubVisitors = new SplObjectStorage();

$visitorAlexander = new Dancer('Alexander hip-hop and pop dancer', [new Hiphop(), new Pop()]);
$visitorNataly = new Dancer('Nataly house and hip-hop dancer', [new House(), new Hiphop()]);
$visitorEvgeny = new Dancer('Evgeny pop dancer', [new PopDance()]);

$nightClubVisitors->attach($visitorAlexander);
$nightClubVisitors->attach($visitorNataly);
$nightClubVisitors->attach($visitorEvgeny);

$nightClubDanceFloor = new DanceFloor($nightClubVisitors, $trackList);


$nightClubDanceFloor->startParty();