<?php
session_start();
include 'class/LibraryDB.php';
include 'class/User.php';
include 'class/Book.php';
include 'class/Category.php';
include 'class/Borrow.php';
include 'class/DetailBorrow.php';
include 'class/Student.php';

include 'controllers/Home.php';
include 'controllers/User.php';
include 'controllers/Book.php';
include 'controllers/Category.php';
include 'controllers/DetailBorrow.php';
include 'controllers/Student.php';
include 'controllers/Borrow.php';

include 'models/ConnectDB.php';
include 'models/UserDB.php';
include 'models/BookDB.php';
include 'models/CategoryDB.php';
include 'models/DetailBorrowDB.php';
include 'models/StudentDB.php';
include 'models/BorrowDB.php';

include 'function-support/function-support.php';

$home = new \controllers\Home();
$user = new \controllers\User();
$book = new \controllers\Book();
$category = new \controllers\Category();
$student = new \controllers\Student();
$borrow = new \controllers\Borrow();
if (isset($_REQUEST['pages'])) {
    switch ($_REQUEST['pages']) {
        case 'user':
            if (isset($_REQUEST['actions'])) {
                switch ($_REQUEST['actions']) {
                    case 'user':
                        checkTrueLogin();
                        $user->login();
                        break;
                    case 'logout':
                        $user->logout();
                        break;
                    case 'signUp':
                        checkTrueLogin();
                        $user->signUp();
                        break;
                    case 'forgotPassword':
                        checkTrueLogin();
                        if (isset($_REQUEST['param'])) {
                            switch ($_REQUEST['param']) {
                                case 'checkPhone':
                                    $user->forgotPassword();
                                    break;
                                case 'resetPassword':
                                    $user->resetPassword();
                                    break;
                                default:
                                    $user->forgotPassword();
                            }
                        } else {
                            $user->forgotPassword();
                        }
                        break;
                    default:
                        checkTrueLogin();
                        $user->login();
                }
            } else {
                checkTrueLogin();
                $user->login();
            }
            break;
        case 'home':
            checkFalseLogin();
            $home->show();
            break;
        case 'category':
            checkFalseLogin();
            if (isset($_REQUEST['actions'])) {
                switch ($_REQUEST['actions']) {
                    case 'add':
                        $category->add();
                        break;
                    case 'delete':
                        if (isset($_REQUEST['id'])) {
                            $category->delete();
                        } else {
                            header('Location: index.php?pages=category');
                        }
                        break;
                    case 'update':
                        if (isset($_REQUEST['id'])) {
                            $category->update();
                        } else {
                            header('Location: index.php?pages=category');
                        }
                        break;
                    case 'search':
                        if (isset($_REQUEST['choose']) && isset($_REQUEST['keyword'])) {
                            $category->search();
                        } else {
                            $category->show();
                        }
                        break;
                    default:
                        header('Location: index.php?pages=category');
                }
            } else {
                $category->show();
            }
            break;
        case 'student':
            checkFalseLogin();
            if (isset($_REQUEST['actions'])) {
                switch ($_REQUEST['actions']) {
                    case 'add':
                        $student->add();
                        break;
                    case 'update':
                        if (isset($_REQUEST['id'])) {
                            $student->update();
                        } else {
                            header('Location: index.php?pages=student');
                        }
                        break;
                    case 'delete':
                        if (isset($_REQUEST['id'])) {
                            $student->delete();
                        } else {
                            header('Location: index.php?pages=student');
                        }
                        break;
                    case 'search':
                        if (isset($_REQUEST['choose']) && isset($_REQUEST['keyword'])) {
                            $student->search();
                        } else {
                            $student->show();
                        }
                        break;
                    default:
                        header('Location: index.php?pages=student');
                }
            } else {
                $student->show();
            }
            break;
        case 'book':
            checkFalseLogin();
            if (isset($_REQUEST['actions'])) {
                switch ($_REQUEST['actions']) {
                    case 'add':
                        $book->add();
                        break;
                    case 'delete':
                        if (isset($_REQUEST['id'])) {
                            $book->delete();
                        } else {
                            $book->show();
                        }
                        break;
                    case 'update':
                        if (isset($_REQUEST['id'])) {
                            $book->update();
                        } else {
                            header('Location: index.php?pages=book');
                        }
                        break;
                    case 'search':
                        if ((isset($_REQUEST['choose'])&&isset($_REQUEST['keyword']))||isset($_REQUEST['id'])){
                            $book->search();
                        } else {
                            header('Location: index.php?pages=book');
                        }
                        break;
                    default:
                        $book->show();
                }
            } else {
                $book->show();
            }
            break;
        case 'borrow':
            checkFalseLogin();
            if (isset($_REQUEST['actions'])) {
                switch ($_REQUEST['actions']) {
                    case 'addBorrow':
                        $borrow->addBorrow();
                        break;
                    case 'addBook':
                        $borrow->addBook();
                        break;
                    case 'delete':
                        if (isset($_REQUEST['id'])) {
                            $borrow->delete();
                        } else {
                            header('Location: index.php?pages=borrow');
                        }
                        break;
                    case 'update':
                        if (isset($_REQUEST['id'])) {
                            $borrow->update();
                        } else {
                            header('Location: index.php?pages=borrow');
                        }
                        break;
                    case 'search':
                        if (isset($_REQUEST['choose'])&&isset($_REQUEST['keyword'])) {
                            $borrow->search();
                        } else {
                            header('Location: index.php?pages=borrow');
                        }
                        break;
                    default:
                        header('Location: index.php?pages=borrow');
                }
            } else {
                $borrow->show();
            }
            break;
        default:
            checkFalseLogin();
            $home->show();
    }
} else {
    checkFalseLogin();
    $home->show();
}