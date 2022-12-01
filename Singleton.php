<?php

class Singleton
{
    private static $onlyInstance;
    public  $salam;
    private $ticketsList;
    private $userObject;

    private final function __construct()
    {
        $this->ticketsList = array();
    }

    public static function getOnlyInstance(){
        if (self::$onlyInstance == null){
            self::$onlyInstance = new Singleton();
        }
        return self::$onlyInstance;
    }

    public function addTicket($ticket)
    {
        $this->ticketsList[] = $ticket;
    }

    public function getLastAddedTicket(){
        return end($this->ticketsList);
    }

    public function setUserObject($userObject){
        $this->userObject = $userObject;
    }

    public function getUserObject(){
        return $this->userObject;
    }

    /**
     * @return array
     */
    public function getTicketsList()
    {
        return $this->ticketsList;
    }

    /**
     * @param array $ticketsList
     */
    public function setTicketsList($ticketsList)
    {
        $this->ticketsList = $ticketsList;
    }
}

$singleton = Singleton::getOnlyInstance();
