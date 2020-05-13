<?php


namespace models;

use PDO;

class ConnectDB
{
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->username = 'root';
        $this->password = '774111@Tvt';
    }

    function connect()
    {
        $connDB = null;
        try {
            $connDB = new PDO('mysql:host=localhost;dbname=library_manager', $this->username, $this->password);
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }
        return $connDB;
    }
}