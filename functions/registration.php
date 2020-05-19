<?php
include "../db.php"; 

switch ( $_POST['func'] )
{
    case 'login':
        $data = $_POST['data'];
        login($data,$link);
        break;
        
    case 'phone':
        $data = $_POST['data'];
        phone($data,$link);
        break;
        
    case 'email':
        $data = $_POST['data'];
        email($data,$link);
        break;
        
    case 'reg':
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        reg($login, $pass, $name, $surname, $phone, $email, $link);
        break;
}


function login($data,$link){

$result = mysqli_query ($link, "
    SELECT * FROM `users`
    WHERE `user_login` = '" . $data . "'") or die("Ошибка: " . mysqli_error($link));
    $row = mysqli_fetch_array($result);
    if($row == 0){
        echo 'true';
    }else{
        echo "* логин уже используется";
    }
};

function phone($data,$link){
$phone = "+7" . substr(preg_replace('/[^0-9]/', '', $data),1);
$result = mysqli_query ($link, "
    SELECT * FROM `users`
    WHERE `user_phone` = '" . $data . "'") or die("Ошибка: " . mysqli_error($link));
    $row = mysqli_fetch_array($result);
    if($row == 0){
        echo 'true';
    }else{
        echo "* номер уже используется";
    }
};

function email($data,$link){

$result = mysqli_query ($link, "
    SELECT * FROM `users`
    WHERE `user_email` = '" . $data . "'") or die("Ошибка: " . mysqli_error($link));
    $row = mysqli_fetch_array($result);
    if($row == 0){
        echo 'true';
    }else{
        echo "* email уже используется";
    }
};

function reg($login, $pass, $name, $surname, $phone, $email, $link){
    if($login==''|| $pass=='' || $name=='' || $surname=='' || $phone=='' || $email==''){
        echo 'Необходимо заполнить все поля!';
    
    }elseif(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email)){
        echo 'Ошибка ввода Email!';
    }else{
        $result = mysqli_query ($link, "INSERT INTO `users` (`user_login`, `user_password`, `user_name`, `user_surname`, `user_phone`, `user_email`) values('". $login ."', '". $pass ."','". $name ."', '". $surname ."', '". $phone ."', '". $email ."')") or die("Ошибка: " . mysqli_error($link));
        echo 'true';
    }
}
?>
