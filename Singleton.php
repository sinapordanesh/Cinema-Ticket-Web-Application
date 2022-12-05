<?php

/**
 *
 */
class Singleton
{
    /**
     * @var
     */
    private static $onlyInstance;
    /**
     * @var array
     */
    private $ticketsList;
    /**
     * @var
     */
    private $userObject;

    /**
     *
     */
    private final function __construct()
    {
        $this->ticketsList = array();
    }

    /**
     * @return Singleton
     */
    public static function getOnlyInstance(){
        if (self::$onlyInstance == null){
            self::$onlyInstance = new Singleton();
        }
        return self::$onlyInstance;
    }

    /**
     * @param $ticket
     * @return void
     */
    public function addTicket($ticket)
    {
        $this->ticketsList[] = $ticket;
    }

    /**
     * @return false|mixed
     */
    public function getLastAddedTicket(){
        return end($this->ticketsList);
    }

    /**
     * @param $userObject
     * @return void
     */
    public function setUserObject($userObject){
        $this->userObject = $userObject;
    }

    /**
     * @return mixed
     */
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
