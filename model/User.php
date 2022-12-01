<?php
require_once ("ModelsDatabase.php");

abstract class User extends ModelsDatabase
{
    private $userId;
    private $email;
    private $name;
    private $role;

    public function __construct($userId, $email, $name, $role)
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->name = $name;
        $this->role = $role;
    }

    public function dbGet()
    {
        // TODO: Implement dbGet() method.
    }

    public function dbSet()
    {
        // TODO: Implement dbSet() method.
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $isAdmin
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

}