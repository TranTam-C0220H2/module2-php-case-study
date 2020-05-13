<?php


namespace library;


class DetailBorrow
{
    protected $bookId;
    protected $borrowId;

    public function __construct($bookId, $borrowId)
    {
        $this->bookId = $bookId;
        $this->borrowId = $borrowId;
    }

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @return mixed
     */
    public function getBorrowId()
    {
        return $this->borrowId;
    }
}