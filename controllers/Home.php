<?php


namespace controllers;


use models\UserDB;

class Home
{
    function show()
    {
        include 'views/home/home.php';
    }

    function login()
    {
        include 'views/user/user.php';
    }

    function signUp()
    {
        include 'views/user/signUp.php';
    }
}