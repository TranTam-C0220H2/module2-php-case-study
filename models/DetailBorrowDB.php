<?php


namespace models;


use library\LibraryDB;

class DetailBorrowDB extends LibraryDB
{
    function add($detailBorrow)
    {
        $sql = "INSERT INTO book_borrow (book_id, borrow_id) VALUES (:bookId, :borrowId);";
        $stmt = $this->connDb->prepare($sql);
        $stmt->bindParam(':bookId', $detailBorrow->bookId);
        $stmt->bindParam(':borrowId', $detailBorrow->borrowId);
        $stmt->execute();
    }

    function getDetailBorrow($idBorrow)
    {
        $sql = "SELECT students.id AS idStudent, students.name AS nameStudent, students.email AS emailStudent, students.phone AS phoneStudent,
                borrows.id AS idBorrow, borrows.borrow_date AS borrowDate, borrows.return_date AS returnDate, 
                books.id AS idBook, books.image AS imageBook, books.name AS nameBook, books.author AS authorBook, books.price AS priceBook,
                categories.name AS nameCategory
                FROM students
                JOIN borrows
                ON students.id = borrows.student_id
                JOIN book_borrow
                ON borrows.id = book_borrow.borrow_id
                JOIN books
                ON book_borrow.book_id = books.id
                JOIN categories
                ON categories.id = books.category_id
                WHERE borrows.id = '$idBorrow';";
        $stmt = $this->connDb->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}