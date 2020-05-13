<?php


namespace models;


use library\LibraryDB;

class UserDB extends LibraryDB
{
    function add($user) {
        $name = $user->getName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $phone = $user->getPhone();
        $sql = 'INSERT INTO users (name,email,password,phone) VALUES (?,?,?,?);';
        $stmt = $this->connDb->prepare($sql);
        $stmt->bindParam(1,$name);
        $stmt->bindParam(2,$email);
        $stmt->bindParam(3,$password);
        $stmt->bindParam(4,$phone);
        $stmt->execute();
    }

    function getRetrievalInfo() {
        $sql = 'SELECT email, phone FROM users;';
        $stmt = $this->connDb->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function updatePasswordByEmail($email, $password) {
        $sql = 'UPDATE users SET password = :password WHERE email = :email;';
        $stmt = $this->connDb->prepare($sql);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }
}