<?php


namespace models;


use library\LibraryDB;
use PDO;

class BookDB extends LibraryDB
{
    function getAll()
    {
        $sql = "SELECT books.id, books.image, books.name, books.author, books.price, books.status, categories.name AS nameCategory FROM books LEFT JOIN categories ON books.category_id = categories.id;";
        $stmt = $this->connDb->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function add($book)
    {
        $name = $book->getName();
        $author = $book->getAuthor();
        $price = $book->getPrice();
        $categoryId = $book->getcategoryId();
        $image = $book->getImage();
        $status = $book->getStatus();
        $sql = 'insert into books (name,author,price,category_id,image,status) values (?,?,?,?,?,?);';
        $stmt = $this->connDb->prepare($sql);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $author);
        $stmt->bindParam(3, $price);
        $stmt->bindParam(4, $categoryId);
        $stmt->bindParam(5, $image);
        $stmt->bindParam(6, $status);
        $stmt->execute();
    }
    function getImageById($id)
    {
        $sql = 'SELECT image FROM books WHERE id = :id;';
        $stmt = $this->connDb->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    function update($id, $book)
    {
        $name = $book->getName();
        $author = $book->getAuthor();
        $price = $book->getPrice();
        $categoryId = $book->getCategoryId();
        $image = $book->getImage();
        $status = $book->getStatus();
        $sql = 'UPDATE books SET name = :name, author = :author, price = :price, category_id = :category_id, image = :image, status = :status WHERE id = :id;';
        $stmt = $this->connDb->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category_id', $categoryId);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    function searchByRowJoin2Table($row, $keyword)
    {
        $sql = 'SELECT books.id, books.image, books.name, books.author, books.price, books.status, categories.name AS nameCategory FROM books LEFT JOIN categories ON books.category_id = categories.id WHERE ' . $row . ' LIKE "%' . $keyword . '%";';
        $stmt = $this->connDb->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function updateStatusById($arrayId)
    {
        $sql = "UPDATE books SET status = 'Empty' WHERE id = ?";
        for ($i = 1; $i < count($arrayId); $i++) {
            $sql = $sql . ' OR id = ?';
        }
        $stmt = $this->connDb->prepare($sql);
        for ($i = 0; $i < count($arrayId); $i++) {
            $stmt->bindParam($i + 1, $arrayId[$i]);
        }
        $stmt->execute();
    }
}