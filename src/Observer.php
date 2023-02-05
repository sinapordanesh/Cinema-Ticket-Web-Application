<?php

interface Observer
{
    /**
     * @param $update
     * @return mixed
     */
    public function update($update);

}