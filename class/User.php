<?php


namespace library;


class User
{
    protected $name;
    protected $email;
    protected $password;
    protected $phone;

    public function __construct($name,$email,$password,$phone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }
}