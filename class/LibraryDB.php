<?php


namespace library;


use models\ConnectDB;
use PDO;

class LibraryDB
{
    protected $connDb;

    public function __construct()
    {
        $this->connDb = new ConnectDB();
        $this->connDb = $this->connDb->connect();
    }

    function getDB($row,$table)
    {
        $sql = "SELECT $row FROM $table;";
        $stmt = $this->connDb->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }

    function getAllById($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id = $id;";
        $stmt = $this->connDb->query($sql);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = $id;";
        $this->connDb->query($sql);
    }

    function searchByRow($table, $row, $keyword)
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE ' . $row . ' LIKE "%' . $keyword . '%";';
        $stmt = $this->connDb->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}