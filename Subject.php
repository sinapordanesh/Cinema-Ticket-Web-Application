<?php

interface Subject
{
    public function registerObserver($observer);
    public function removeObserver($observer);
    public function notifyAllObservers();

}