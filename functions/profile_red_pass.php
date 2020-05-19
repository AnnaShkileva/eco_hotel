<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "../db.php";

    $pass = $_POST['pass'];
    $login = $_POST['login'];
    $result = mysqli_query ($link, "UPDATE `users`
    SET `user_password` = '" . $pass ."'
    WHERE `user_login` = '". $login ."'") or die("Ошибка: " . mysqli_error($link));
    if($result == true){
        echo 'true';
    };
};
?>
