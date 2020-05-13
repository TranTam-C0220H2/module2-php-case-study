<?php


namespace library;


class Borrow
{
    protected $returnDate;
    protected $studentId;
    protected $status;

    public function __construct($returnDate, $studentId, $status)
    {
        $this->returnDate = $returnDate;
        $this->studentId = $studentId;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getReturnDate()
    {
        return $this->returnDate;
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
    public function getStudentId()
    {
        return $this->studentId;
    }

}