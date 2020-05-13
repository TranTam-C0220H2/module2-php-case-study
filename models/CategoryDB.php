<?php


namespace models;


use library\LibraryDB;

class CategoryDB extends LibraryDB
{
    function add($category)
    {
        $name = $category->getName();
        $sql = 'insert into categories (name) values (:name);';
        $stmt = $this->connDb->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }

    function update($id, $category)
    {
        $name = $category->getName();
        $sql = "update categories set name = :name where id = :id;";
        $stmt = $this->connDb->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

}