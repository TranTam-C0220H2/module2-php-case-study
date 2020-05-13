<?php


namespace controllers;


use models\BookDB;
use models\BorrowDB;
use models\DetailBorrowDB;
use models\StudentDB;

class Borrow
{
    protected $borrow;

    public function __construct()
    {
        $this->borrow = new BorrowDB();
    }

    function show()
    {
        $arrayBorrow = $this->borrow->getDB('*', 'borrows');
        include 'views/borrow/list.php';
    }

    function addBorrow()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $returnDate = $_REQUEST['returnDate'];
            $_SESSION['returnDate'] = $_REQUEST['returnDate'];
            $_SESSION['idStudent'] = $_REQUEST['idStudent'];
            $_SESSION['status'] = $_REQUEST['status'];
            $_SESSION['numberOfBooks'] = $_REQUEST['numberOfBooks'];
            $differentDate = strtotime($returnDate) - strtotime(date('Y/m/d'));
            $student = new StudentDB();
            $arrayIdStudent = $student->getDB('id', 'students');

            if ($_SESSION['returnDate'] != '' && $_SESSION['idStudent'] != '' && $_SESSION['numberOfBooks'] != '' && $differentDate > 0 && checkInId($_SESSION['idStudent'], $arrayIdStudent)) {
                header('Location: index.php?pages=borrow&actions=addBook');
            } else {
                if ($differentDate <= 0) {
                    $_SESSION['differentDate'] = false;
                }
                if (!checkInId($_SESSION['idStudent'], $arrayIdStudent)) {
                    unset($_SESSION['idStudent']);
                }
                header('Location: index.php?pages=borrow&actions=addBorrow');
            }
        } else {
            include 'views/borrow/addBorrow.php';
        }
    }

    function addBook()
    {
        if (!isset($_SESSION['numberOfBooks'])) {
            $_SESSION['numberOfBooks'] = $_REQUEST['numberOfBooks'];
            $book = new BookDB();
            $student = new StudentDB();
            $checkEmptyBook = 0;
            $_SESSION['arrayBookId'] = [];
            for ($i = 1; $i <= $_SESSION['numberOfBooks']; $i++) {
                $_SESSION["bookId" . $i] = $_REQUEST["bookId" . $i];
                $arrayDataBookById = $book->getAllById('books', $_SESSION["bookId" . $i]);
                if ($arrayDataBookById->status != 'Exist') {
                    unset($_SESSION["bookId" . $i]);
                    $checkEmptyBook += 1;
                    break;
                }
                array_push($_SESSION['arrayBookId'], $_SESSION["bookId" . $i]);
            }
            if ($checkEmptyBook == 0 && checkCoincideInArray($_SESSION['arrayBookId'])) {
                $borrow = new \library\Borrow($_SESSION['returnDate'], $_SESSION['idStudent'], $_SESSION['status']);
                $this->borrow->add($borrow);
                $book->updateStatusById($_SESSION['arrayBookId']);
                $student->updateStatus($_SESSION['idStudent']);
                unset($_SESSION['returnDate']);
                unset($_SESSION['idStudent']);
                unset($_SESSION['status']);
                unset($_SESSION['numberOfBooks']);
                $newIdBorrow = $this->borrow->getMaxId()["MAX(id)"];
                $detailBorrowDB = new DetailBorrowDB();
                for ($i = 1; $i <= count($_SESSION['arrayBookId']); $i++) {
                    $detailBorrow = new \library\DetailBorrow($_SESSION["bookId" . $i], $newIdBorrow);
                    $detailBorrowDB->add($detailBorrow);
                    unset($_SESSION["bookId" . $i]);
                }
                unset($_SESSION['arrayBookId']);
                header('Location: index.php?pages=borrow');
            } else {
                unset($_SESSION['arrayBookId']);
                header('Location: index.php?pages=borrow&actions=addBook');
            }
        } else {
            include 'views/borrow/addBook.php';
        }
    }

    function delete()
    {
        $id = $_REQUEST['id'];
        $this->borrow->delete('borrows', $id);
        header('Location: index.php?pages=borrow');
    }

    function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $expectedReturnDate = $_REQUEST['expectedReturnDate'];
            $idStudent = $_REQUEST['idStudent'];
            $_SESSION['idStudent'] = $_REQUEST['idStudent'];
            $id = $_REQUEST['id'];
            $status = $_REQUEST['status'];
            $borrowById = $this->borrow->getAllById('borrows', $id);
            $differentDate = strtotime($expectedReturnDate) - strtotime($borrowById->borrow_date);
            $student = new StudentDB();
            $arrayIdStudent = $student->getDB('id', 'students');
            if ($differentDate > 0 && checkInId($_SESSION['idStudent'], $arrayIdStudent)) {
                $this->borrow->update($id, $_REQUEST['idStudent'], $expectedReturnDate, $status);
                unset($_SESSION['idOfUpdate']);
                unset($_SESSION['idStudent']);
                header('Location: ../borrows.php');
            } else {
                if (in_array($idStudent, $arrayIdStudent)) {
                    $this->borrow->updateNoExpectedReturnDate($id, $_SESSION['idStudent'], $status);
                    unset($_SESSION['idStudent']);
                    header('Location: ../borrows.php');
                } else {
                    $_SESSION['differentDate'] = false;
                    unset($_SESSION['idStudent']);
                    header('Location: ../view/update.php');
                }
            }
        } else {
            $id = $_REQUEST['id'];
            $borrowById = $this->borrow->getAllById('borrow', $id);
            $_SESSION['idStudent'] = $borrowById->student_id;
            include 'views/borrow/update.php';
        }
    }

    function search()
    {
        if (isset($_REQUEST['id'])) {
            $keyword = $_REQUEST['id'];
            $arraySearch = $this->borrow->searchByRow('borrows', 'student_id', $keyword);
        } else {
            $keyword = $_REQUEST['keyword'];
            $choose = $_REQUEST['choose'];
            if ($choose == 'ID') {
                $arraySearch = $this->borrow->searchByRow('borrows', 'id', $keyword);
            } elseif ($choose == 'ID Student') {
                $arraySearch = $this->borrow->searchByRow('borrows', 'student_id', $keyword);
            } elseif ($choose == 'Borrow Date') {
                $arraySearch = $this->borrow->searchByRow('borrows', 'borrow_date', $keyword);
            } elseif ($choose == 'Return Date') {
                $arraySearch = $this->borrow->searchByRow('borrows', 'return_date', $keyword);
            } elseif ($choose == 'Expected Return Date') {
                $arraySearch = $this->borrow->searchByRow('borrows', 'expected_return_date', $keyword);
            } elseif ($choose == 'Status') {
                $arraySearch = $this->borrow->searchByRow('borrows', 'status', $keyword);
            }
        }
        include 'views/borrow/search.php';
    }
}