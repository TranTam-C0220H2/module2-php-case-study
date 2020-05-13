<?php


namespace library;


class Student
{
    protected $image;
    protected $name;
    protected $email;
    protected $phone;
    protected $birthDay;
    protected $address;
    protected $status;
    protected $note;

    public function __construct($image,$name,$email,$phone,$birthDay,$address,$status,$note)
    {
        $this->image = $image;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->birthDay = $birthDay;
        $this->address = $address;
        $this->status = $status;
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
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
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getBirthDay()
    {
        return $this->birthDay;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }
}