<?php


namespace controllers;


use models\StudentDB;

class Student
{
    protected $student;

    public function __construct()
    {
        $this->student = new StudentDB();
    }

    function show()
    {
        $arrayStudent = $this->student->getDB('*', 'students');
        include 'views/student/list.php';
    }

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $image = $_FILES['image'];
            $_SESSION['imageName'] = $image['name'];
            $_SESSION['name'] = $_REQUEST['name'];
            $_SESSION['email'] = $_REQUEST['email'];
            $_SESSION['phone'] = $_REQUEST['phone'];
            $_SESSION['birthDay'] = $_REQUEST['birthDay'];
            $_SESSION['address'] = $_REQUEST['address'];
            $status = $_REQUEST['status'];
            $note = $_REQUEST['note'];
            $_SESSION['note'] = $note;
            if ($_SESSION['name'] != '' && $_SESSION['email'] != '' && $_SESSION['phone'] != '') {
                $_SESSION['checkImage'] = checkUploadImage($image, 'images/');
                if ($_SESSION['checkImage'] == 'Upload file thành công') {
                    $student = new \library\Student($_SESSION['imageName'], $_SESSION['name'], $_SESSION['email'], $_SESSION['phone'], $_SESSION['birthDay'], $_SESSION['address'], $status, $note);
                    $this->student->add($student);
                    unset($_SESSION['name']);
                    unset($_SESSION['email']);
                    unset($_SESSION['phone']);
                    unset($_SESSION['birthDay']);
                    unset($_SESSION['address']);
                    unset($_SESSION['note']);
                    unset($_SESSION['imageName']);
                    unset($_SESSION['checkImage']);
                    header('Location: index.php?pages=student');
                } else {
                    header('Location: index.php?pages=student&actions=add');
                }
            }
        } else {
            include 'views/student/add.php';
        }
    }

    function delete()
    {
        $id = $_REQUEST['id'];
        $imagePath = $this->student->getImageById($id);
        unlink('images/' . $imagePath->image);
        $this->student->delete('students',$id);
        header('Location: index.php?pages=student');
    }

    function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_REQUEST['id'];
            $image = $_FILES['image'];
            $_SESSION['imageName'] = $image['name'];
            $_SESSION['name'] = $_REQUEST['name'];
            $_SESSION['email'] = $_REQUEST['email'];
            $_SESSION['phone'] = $_REQUEST['phone'];
            $_SESSION['birthDay'] = $_REQUEST['birthDay'];
            $_SESSION['address'] = $_REQUEST['address'];
            $status = $_REQUEST['status'];
            $_SESSION['note'] = $_REQUEST['note'];

            if ($_SESSION['name'] != '' && $_SESSION['email'] != '' && $_SESSION['phone'] != '') {
                $_SESSION['checkImage'] = checkUploadImage($image, 'images/');
                if (($_SESSION['checkImage'] == 'Lỗi : File đã tồn tại.' && $_SESSION['imageName'] == $_SESSION['imageById']) || $_SESSION['checkImage'] == "Lỗi: Image is empty") {
                    $student = new \library\Student($_SESSION['imageById'], $_SESSION['name'], $_SESSION['email'], $_SESSION['phone'], $_SESSION['birthDay'], $_SESSION['address'], $status, $_SESSION['note']);
                    update($this->student, $student, $id);
                    header("Location: index.php?pages=student");
                } elseif ($_SESSION['checkImage'] == 'Upload file thành công') {
                    $student = new \library\Student($_SESSION['imageName'], $_SESSION['name'], $_SESSION['email'], $_SESSION['phone'], $_SESSION['birthDay'], $_SESSION['address'], $status, $_SESSION['note']);
                    unlink('images/' . $_SESSION['imageById']);
                    update($this->student, $student, $id);
                    header("Location: index.php?pages=student");
                } else {
                    header("Location: index.php?pages=student&actions=update&id=$id");
                }
            } else {
                header("Location: index.php?pages=student&actions=update&id=$id");
            }
        } else {
            $id = $_REQUEST['id'];
            $studentById = $this->student->getAllById('students', $id);
            $name = $studentById->name;
            $email = $studentById->email;
            $phone = $studentById->phone;
            $birthDay = $studentById->birthday;
            $address = $studentById->address;
            $_SESSION['imageById'] = $studentById->image;
            $note = $studentById->note;
            include 'views/student/update.php';
        }
    }

    function search()
    {
        $arraySearch = [];
        $keyword = $_REQUEST['keyword'];
        $choose = $_REQUEST['choose'];
        if ($choose == 'ID') {
            $arraySearch = $this->student->searchByRow('students', 'id', $keyword);
        } elseif ($choose == 'Name') {
            $arraySearch = $this->student->searchByRow('students', 'name', $keyword);
        } elseif ($choose == 'Email') {
            $arraySearch = $this->student->searchByRow('students', 'email', $keyword);
        } elseif ($choose == 'Phone') {
            $arraySearch = $this->student->searchByRow('students', 'phone', $keyword);
        } elseif ($choose == 'Status') {
            $arraySearch = $this->student->searchByRow('students', 'status', $keyword);
        } elseif ($choose == 'Note') {
            $arraySearch = $this->student->searchByRow('students', 'note', $keyword);
        }
        include 'views/student/search.php';
    }
}