<?php


namespace controllers;


use models\BookDB;
use models\CategoryDB;

class Book
{
    protected $book;

    public function __construct()
    {
        $this->book = new BookDB();
    }

    function show()
    {
        $arrayBook = $this->book->getAll();
        include 'views/book/list.php';
    }

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['name'] = $_REQUEST['name'];
            $_SESSION['author'] = $_REQUEST['author'];
            $_SESSION['price'] = $_REQUEST['price'];
            $_SESSION['categoryId'] = $_REQUEST['categoryId'];
            $image = $_FILES['image'];
            $_SESSION['imageName'] = $image['name'];
            $status = $_REQUEST['status'];
            $category = new CategoryDB();
            $arrayObjectCategoryId = $category->getDB('id', 'categories');

            if ($_SESSION['name'] != '' && $_SESSION['author'] != '' && $_SESSION['price'] != '' && checkInId($_SESSION['categoryId'], $arrayObjectCategoryId)) {
                $_SESSION['checkImage'] = checkUploadImage($image, 'images/');
                if ($_SESSION['checkImage'] == 'Upload file thành công') {
                    $book = new \library\Book($_SESSION['name'], $_SESSION['author'], $_SESSION['price'], $_SESSION['categoryId'], $_SESSION['imageName'], $status);
                    $this->book->add($book);
                    unset($_SESSION['name']);
                    unset($_SESSION['author']);
                    unset($_SESSION['price']);
                    unset($_SESSION['categoryId']);
                    unset($_SESSION['imageName']);
                    unset($_SESSION['checkImage']);
                    header('Location: index.php?pages=book');
                } else {
                    header('Location: index.php?pages=book&actions=add');
                }
            } else {
                if (!checkInId($_SESSION['categoryId'], $arrayObjectCategoryId)) {
                    unset($_SESSION['categoryId']);
                }
                header('Location: index.php?pages=book&actions=add');
            }
        } else {
            include 'views/book/add.php';
        }
    }

    function delete()
    {
        $id = $_REQUEST['id'];
        $imagePath = $this->book->getImageById($id);
        unlink('images/' . $imagePath->image);
        $this->book->delete('books', $id);
        header('Location: index.php?pages=book');
    }

    function update() {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $id = $_REQUEST['id'];
            $_SESSION['name'] = $_REQUEST['name'];
            $_SESSION['author'] = $_REQUEST['author'];
            $_SESSION['price'] = $_REQUEST['price'];
            $_SESSION['categoryId'] = $_REQUEST['categoryId'];
            $image = $_FILES['image'];
            $_SESSION['imageName'] = $image['name'];
            $status = $_REQUEST['status'];
            $arrayCategoryId = $this->book->getDB('id','books');
            if ($_SESSION['name'] != '' && $_SESSION['author'] != '' && $_SESSION['price'] != '' && checkInId($_SESSION['categoryId'], $arrayCategoryId)) {
                $_SESSION['checkImage'] = checkUploadImage($image, 'images/');
                if (($_SESSION['checkImage'] == 'Lỗi : File đã tồn tại.' && $_SESSION['imageName'] == $_SESSION['imageById'])||$_SESSION['checkImage'] == "Lỗi: Image is empty") {
                    $book = new \library\Book($_SESSION['name'],$_SESSION['author'],$_SESSION['price'], $_SESSION['categoryId'],$_SESSION['imageById'],$status);
                    update($this->book, $book, $id);
                    header("Location: index.php?pages=book");
                } elseif ($_SESSION['checkImage'] == 'Upload file thành công') {
                    $book = new \library\Book($_SESSION['name'],$_SESSION['author'],$_SESSION['price'], $_SESSION['categoryId'],$_SESSION['imageById'],$status);
                    unlink('images/' . $_SESSION['imageById']);
                    update($this->book, $book, $id);
                    header("Location: index.php?pages=book");
                } else {
                    header("Location: index.php?pages=book&actions=update&$id");
                }
            } else {
                if (!checkInId($_SESSION['categoryId'], $arrayCategoryId)) {
                    unset($_SESSION['categoryId']);
                }
                header("Location: index.php?pages=book&actions=update&$id");
            }

        } else {
            $id = $_REQUEST['id'];
            $bookById = $this->book->getAllById('books',$id);
            $name = $bookById->name;
            $author = $bookById->author;
            $price = $bookById->price;
            $categoryId = $bookById->category_id;
            $_SESSION['imageById'] = $bookById->image;
            include 'views/book/update.php';
        }
    }
    function search() {
        if (isset($_REQUEST['id'])) {
            $keyword = $_REQUEST['id'];
            $arraySearch = $this->book->searchByRowJoin2Table('categories.id', $keyword);
        } else {
            $keyword = $_REQUEST['keyword'];
            $choose = $_REQUEST['choose'];
            if ($choose == 'ID') {
                $arraySearch = $this->book->searchByRowJoin2Table('books.id', $keyword);
            } elseif ($choose == 'Name') {
                $arraySearch = $this->book->searchByRowJoin2Table('books.name', $keyword);
            } elseif ($choose == 'Author') {
                $arraySearch = $this->book->searchByRowJoin2Table('author', $keyword);
            } elseif ($choose == 'Price') {
                $arraySearch = $this->book->searchByRowJoin2Table('price', $keyword);
            } elseif ($choose == 'Category') {
                $arraySearch = $this->book->searchByRowJoin2Table('categories.name', $keyword);
            } elseif ($choose == 'Status') {
                $arraySearch = $this->book->searchByRowJoin2Table('status', $keyword);
            }
        }
        include 'views/book/search.php';
    }
}