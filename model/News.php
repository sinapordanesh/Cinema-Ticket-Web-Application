<?php

require_once ("ModelsDatabase.php");
require_once ("Subject.php");


class News extends ModelsDatabase implements Subject
{
    private $title;
    private $content;
    private $date;

    public function __construct($title, $content, $date)
    {
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
    }

    public function dbGet()
    {
        // TODO: Implement dbGet() method.
    }

    public function dbSet()
    {
        // TODO: Implement dbSet() method.
    }

    public function registerObserver($observer)
    {
        // TODO: Implement registerObserver() method.
    }

    public function removeObserver($observer)
    {
        // TODO: Implement removeObserver() method.
    }

    public function notifyAllObservers()
    {
        // TODO: Implement notifyAllObservers() method.
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getObservers()
    {
        return $this->observers;
    }

    /**
     * @param mixed $observers
     */
    public function setObservers($observers)
    {
        $this->observers = $observers;
    }
}