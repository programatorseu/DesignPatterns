<?php
class EasterConference
{
    private $totalChampionships;
    public function __construct()
    {
        $this->totalChampionships = 24;
    }
    public function getChampionships()
    {
        return $this->totalChampionships;
    }
}
class WesternConference
{
    private $totalChampionships;
    public function __construct()
    {
        $this->totalChampionships = 34;
    }
    public function getChampionships()
    {
        return $this->totalChampionships;
    }
}

class ConferenceFactory
{
    public static function create(string $type)
    {
        return ($type == "west") ? new EasterConference() : new WesternConference();
    }
}

$conference = ConferenceFactory::create('western');

var_dump($conference);
