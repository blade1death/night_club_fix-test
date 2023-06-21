<?php

use App\DanceFloor;
use Behavior\Hiphop;
use Behavior\House;
use Behavior\Pop as PopDance;
use Entity\Dancer;
use Entity\Music\Electrohouse;
use Entity\Music\Music;
use Entity\Music\Pop;
use Entity\Music\RAndB;

require_once 'vendor/autoload.php';

$trackList = new SplObjectStorage();

$randbTrack = new Music('Какой-то R&B трек', new RAndB());
$electroHouseTrack = new Music('Какой-то трек Электрохаус', new Electrohouse());
$popTrack = new Music('Какой-то поп-трек', new Pop());

$trackList->attach($randbTrack);
$trackList->attach($electroHouseTrack);
$trackList->attach($popTrack);

$nightClubVisitors = new SplObjectStorage();

$visitorAlexander = new Dancer('Александр танцор хип-хопа и эстрады', [new Hiphop(), new Pop()]);
$visitorNataly = new Dancer('Натали Хаус и танцовщица хип-хопа', [new House(), new Hiphop()]);
$visitorEvgeny = new Dancer('Евгений поп танцор', [new PopDance()]);

$nightClubVisitors->attach($visitorAlexander);
$nightClubVisitors->attach($visitorNataly);
$nightClubVisitors->attach($visitorEvgeny);

$nightClubDanceFloor = new DanceFloor($nightClubVisitors, $trackList);


$nightClubDanceFloor->startParty();