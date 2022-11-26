<?php

abstract class User
{
    private $userId;
    private $name;
    private $isAdmin;

    public function __construct($userId, $name, $isAdmin)
    {
        $this->userId = $userId;
        $this->name = $name;
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param mixed $isAdmin
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

}