<?php


namespace controllers;


use models\CategoryDB;

class Category
{
    protected $category;

    public function __construct()
    {
        $this->category = new CategoryDB();
    }

    function show()
    {
        $arrayCategory = $this->category->getDB('*', 'categories');
        include 'views/category/list.php';
    }

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_REQUEST['name'];
            $category = new \library\Category($name);
            if (!empty($name)) {
                $this->category->add($category);
                header('Location: index.php?pages=category');
            } else {
                include 'views/category/add.php';
            }
        } else {
            include 'views/category/add.php';
        }
    }

    function delete()
    {
        $id = $_REQUEST['id'];
        $this->category->delete('categories', $id);
        header('Location: index.php?pages=category');
    }
    function update() {
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $arrayName = [];
            foreach ($this->category->getDB('name','categories') as $item) {
                array_push($arrayName,$item->name);
            }
            $category = new \library\Category($name);
            if (!empty($name)) {
                if (!in_array($name,$arrayName)){
                $this->category->update($id, $category);
                header('Location: index.php?pages=category');
                } else {
                    $_SESSION['name'] = false;
                    header("Location: index.php?pages=category&actions=update&id=$id");
                }
            } else {
                header("Location: index.php?pages=category&actions=update&id=$id");
            }
        } else {
            $id = $_REQUEST['id'];
            $name = $this->category->getAllById('categories',$id)->name;
            include 'views/category/update.php';
        }
    }
    function search() {
        $keyword = $_REQUEST['keyword'];
        $choose = $_REQUEST['choose'];
        $arraySearch = [];
        if ($choose == 'ID') {
            $arraySearch = $this->category->searchByRow('categories','id',$keyword);
        } elseif ($choose == 'Name') {
            $arraySearch = $this->category->searchByRow('categories','name',$keyword);
        }
        include 'views/category/search.php';
    }
}