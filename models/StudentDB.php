<?php


namespace models;


use library\LibraryDB;
use PDO;

class StudentDB extends LibraryDB
{
    function add($student)
    {
        $name = $student->getName();
        $birthDay = $student->getBirthDay();
        $address = $student->getAddress();
        $email = $student->getEmail();
        $phone = $student->getPhone();
        $image = $student->getImage();
        $status=$student->getStatus();
        $note=$student->getNote();
        $sql = 'INSERT INTO students (name,birthday,address,email,phone,image,status,note) values (?,?,?,?,?,?,?,?);';
        $stmt = $this->connDb->prepare($sql);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $birthDay);
        $stmt->bindParam(3, $address);
        $stmt->bindParam(4, $email);
        $stmt->bindParam(5, $phone);
        $stmt->bindParam(6, $image);
        $stmt->bindParam(7, $status);
        $stmt->bindParam(8, $note);
        $stmt->execute();
    }

    function getImageById($id)
    {
        $sql = "SELECT image FROM students WHERE id = '$id';";
        $stmt = $this->connDb->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    function update($id, $student)
    {
        $name = $student->getName();
        $birthDay = $student->getBirthDay();
        $address = $student->getAddress();
        $email = $student->getEmail();
        $phone = $student->getPhone();
        $image = $student->getImage();
        $status=$student->getStatus();
        $note=$student->getNote();
        $sql = 'UPDATE students SET name = ?,birthday = ?,address = ?,email = ?,phone = ?,image = ?,status = ?,note = ? WHERE id = ?; ';
        $stmt = $this->connDb->prepare($sql);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $birthDay);
        $stmt->bindParam(3, $address);
        $stmt->bindParam(4, $email);
        $stmt->bindParam(5, $phone);
        $stmt->bindParam(6, $image);
        $stmt->bindParam(7, $status);
        $stmt->bindParam(8, $note);
        $stmt->bindParam(9, $id);
        $stmt->execute();
    }

    function updateStatus($id) {
        $sql = "UPDATE students SET status = 'Borrow' WHERE id = '$id';";
        $stmt = $this->connDb->prepare($sql);
        $stmt->execute();
    }
}