<?php
function checkName($name)
{
    $regexp = '/^[A-Z]{1}[a-z]{0,8}$/';
    return preg_match($regexp, $name);
}

function checkEmail($email)
{
    $regexp = '/^[a-z][a-z0-9\.]*@[a-z0-9]{2,8}\.[a-z0-9]{2,5}$/';
    return preg_match($regexp, $email);
}

function checkPassword($password)
{
    $regexp = '/^(?=.*[A-Z]+)(?=.*\d+)(?=.*[!@#\$&\*]+)[\w!@#\$&\*]{8,20}$/';
    return preg_match($regexp, $password);
}

function checkPhoneNUmber($phoneNumber)
{
    $regexp1 = '/^03[2-9]{1}\d{7}$/';
    $regexp2 = '/^09[0-46-8]{1}\d{7}$/';
    $regexp3 = '/^08[1-689]{1}\d{7}$/';
    $regexp4 = '/^07[06-9]{1}\d{7}$/';
    return preg_match($regexp1, $phoneNumber) || preg_match($regexp2, $phoneNumber) || preg_match($regexp3, $phoneNumber) || preg_match($regexp4, $phoneNumber);
}

function checkFalseLogin()
{
    if (!isset($_SESSION['user'])) {
        header('Location: index.php?pages=user&actions=user');
    }
}

function checkTrueLogin()
{
    if (isset($_SESSION['user'])) {
        header('Location: index.php?pages=home');
    }
}

function checkUploadImage($image, $folderImage)
{
    if (isset($image) && $image['error'] == 0) {
        $arrayAllowed = [
            'jpg' => 'image/jpg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'png' => 'image/png'
        ];

        $imageName = $image['name'];
        $imageType = $image['type'];
        $imageSize = $image['size'];

        $ext = pathinfo($imageName, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $arrayAllowed)) {
            return "Lỗi : Vui lòng chọn đúng định dang file";
        }
        $maxSize = 5 * 1024 * 1024;
        if ($imageSize > $maxSize) {
            return "Lỗi : Kích thước file lớn hơn giới hạn cho phép";
        }
        if (in_array($imageType, $arrayAllowed)) {
            if (file_exists($folderImage . $imageName)) {
                return 'Lỗi : File đã tồn tại.';
            } else {
                move_uploaded_file($image['tmp_name'], $folderImage . $imageName);
                return "Upload file thành công";
            }
        } else {
            return "Lỗi : Có vấn đề xảy ra khi upload file";
        }
    } else {
        return "Lỗi: Image is empty";
    }
}

function checkCoincideInArray($array)
{
    for ($i = 0; $i < count($array) - 1; $i++) {
        for ($j = $i + 1; $j < count($array); $j++) {
            if ($array[$i] == $array[$j]) {
                return false;
            }
        }
    }
    return true;
}

function update($objectDB, $object, $id)
{
    $objectDB->update($id, $object);
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['phone']);
    unset($_SESSION['birthDay']);
    unset($_SESSION['address']);
    unset($_SESSION['note']);
    unset($_SESSION['imageName']);
    unset($_SESSION['checkImage']);
    unset($_SESSION['imageById']);
    unset($_SESSION['author']);
    unset($_SESSION['price']);
    unset($_SESSION['categoryId']);
}

function checkInId($id, $arrayObject)
{
    foreach ($arrayObject as $item) {
        if ($item->id == $id) {
            return true;
        }
    }
    return false;
}
