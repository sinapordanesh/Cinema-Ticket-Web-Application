<?php

class Ticket implements DatabaseRelationships
{
    private $ticketId;
    private $userId = -1;
    private $movie;
    private $showTime;
    private $purchaseDate;
    private $seats;

    public function __construct($ticketId, $userId, $movie, $showTime, $purchaseDate, $seats)
    {
        $this->ticketId = $ticketId;
        $this->userId = $userId;
        $this->movie = $movie;
        $this->showTime = $showTime;
        $this->purchaseDate = $purchaseDate;
        $this->seats = $seats;
    }

    public function dbGet()
    {
        // TODO: Implement dbGet() method.
    }

    public function dbSet()
    {
        // TODO: Implement dbSet() method.
    }
}