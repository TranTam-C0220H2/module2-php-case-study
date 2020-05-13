<?php


namespace library;


class Book
{
    protected $name;
    protected $author;
    protected $price;
    protected $image;
    protected $categoryId;
    protected $status;

    public function __construct($name, $author, $price, $categoryId, $image, $status)
    {
        $this->name = $name;
        $this->author = $author;
        $this->price = $price;
        $this->image = $image;
        $this->categoryId = $categoryId;
        $this->status = $status;
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
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
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
    public function getStatus()
    {
        return $this->status;
    }
}