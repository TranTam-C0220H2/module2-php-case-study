<?php


namespace controllers;


use models\UserDB;

class User
{
    protected $user;

    public function __construct()
    {
        $this->user = new UserDB();
    }

    function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $arrayUser = $this->user->getDB('*', 'users');
            foreach ($arrayUser as $item) {
                if ($item->email == $username && $item->password == $password) {
                    $_SESSION['user'] = true;
                }
            }
            if (isset($_SESSION['user'])) {
                header('Location: index.php?pages=home');
            } else {
                include 'views/user/login.php';
            }
        } else {
            include 'views/user/login.php';
        }
    }

    function logout()
    {
        session_destroy();
        header('Location: index.php?pages=user&actions=user');
    }

    function signUp()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_REQUEST['email'];
            $name = $_REQUEST['name'];
            $password = $_REQUEST['password'];
            $confirmPassword = $_REQUEST['confirmPassword'];
            $phoneNumber = $_REQUEST['phoneNumber'];
            $code = $_REQUEST['code'];
            $checkInfo = 0;
            $arrayUser = $this->user->getDB('*', 'users');

            if ($code == '123456@Abc') {
                if (checkName($name)) {
                    $_SESSION['name'] = $name;
                    $checkInfo++;
                }
                if (checkEmail($email)) {
                    $_SESSION['email'] = $email;
                    $checkInfo++;
                    foreach ($arrayUser as $item) {
                        if ($item->email == $email) {
                            $_SESSION['email'] = '';
                            $checkInfo--;
                            break;
                        }
                    }
                }
                if (checkPassword($password)) {
                    $_SESSION['password'] = $password;
                    $checkInfo++;
                }
                if ($confirmPassword == $password) {
                    $_SESSION['confirmPassword'] = $confirmPassword;
                    $checkInfo++;
                }
                if (checkPhoneNUmber($phoneNumber)) {
                    $_SESSION['phoneNumber'] = $phoneNumber;
                    $checkInfo++;
                }
                if ($checkInfo == 5) {
                    $user = new \library\User($name, $email, $password, $phoneNumber);
                    $this->user->add($user);
                    $_SESSION['user'] = true;
                    unset($_SESSION['name']);
                    unset($_SESSION['email']);
                    unset($_SESSION['password']);
                    unset($_SESSION['confirmPassword']);
                    unset($_SESSION['phoneNumber']);
                    header('Location: index.php?pages=home');
                } else {
                    $_SESSION['code'] = $code;
                    include 'views/user/signUp.php';
                }
            } else {
                $_SESSION['code'] = false;
                include 'views/user/signUp.php';
            }

        } else {
            include 'views/user/signUp.php';
        }
    }

    function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_REQUEST['username'];
            $phoneNumber = $_REQUEST['phoneNumber'];
            $arrayRetrievalInfo = $this->user->getRetrievalInfo();
            foreach ($arrayRetrievalInfo as $item) {
                if ($item['email'] == $username && $item['phone'] == $phoneNumber) {
                    $_SESSION['username'] = $username;
                }
            }
            if (isset($_SESSION['username'])) {
                header("Location: index.php?pages=user&actions=forgotPassword&param=resetPassword");
            } else {
                include 'views/user/checkPhone.php';
            }
        } else {
            include 'views/user/checkPhone.php';
        }
    }
    function resetPassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['username'])) {
            $password = $_REQUEST['password'];
            $confirmPassword = $_REQUEST['confirmPassword'];
            $checkPassword = checkPassword($password);
            if ($checkPassword) {
                if ($password == $confirmPassword) {
                    $this->user->updatePasswordByEmail($_SESSION['username'], $password);
                    $_SESSION['user'] = true;
                    unset($_SESSION['username']);
                    header('Location: index.php?pages=home');
                } else {
                    $_SESSION['checkConfirmPassword'] = false;
                    include 'views/user/resetPassword.php';
                }
            } else {
                $_SESSION['checkPassword'] = false;
                include 'views/user/resetPassword.php';
            }
        } else {
            include 'views/user/resetPassword.php';
        }
    }
}