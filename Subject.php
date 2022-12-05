<?php

interface Subject
{
    /**
     * @param $observer
     * @return mixed
     */
    public function registerObserver($observer);

    /**
     * @param $observer
     * @return mixed
     */
    public function removeObserver($observer);

    /**
     * @return mixed
     */
    public function notifyAllObservers();
}