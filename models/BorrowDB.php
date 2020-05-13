<?php


namespace models;


use library\LibraryDB;

class BorrowDB extends LibraryDB
{
    function add($borrow)
    {
        $returnDate = $borrow->getReturnDate();
        $studentId = $borrow->getStudentId();
        $status = $borrow->getStatus();
        $borrowDate = date('Y-m-d');
        $sql = 'INSERT INTO borrows (borrow_date,return_date,student_id,status) values (?,?,?,?);';
        $stmt = $this->connDb->prepare($sql);
        $stmt->bindParam(1, $borrowDate);
        $stmt->bindParam(2, $returnDate);
        $stmt->bindParam(3, $studentId);
        $stmt->bindParam(4, $status);
        $stmt->execute();
    }
    function update($id, $idStudent, $expectedReturnDate, $status)
    {
        $sql = "UPDATE borrows SET student_id = '$idStudent',expected_return_date = '$expectedReturnDate', status = '$status' WHERE id = '$id';";
        $stmt = $this->connDb->prepare($sql);
        $stmt->execute();
    }
    function updateNoExpectedReturnDate($id, $idStudent, $status)
    {
        $sql = "UPDATE borrows SET student_id = '$idStudent', status = '$status' WHERE id = '$id';";
        $stmt = $this->connDb->prepare($sql);
        $stmt->execute();
    }
    function getMaxId() {
        $sql = "SELECT MAX(id) FROM borrows;";
        $stmt = $this->connDb->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
}