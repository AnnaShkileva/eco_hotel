<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    include "../db.php";
    
    $session_login = $_SESSION['auth_login'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    if($login==''|| $name=='' || $surname=='' || $phone=='' || $email==''){
        
        echo '<div id="profile_message" style="color: red">Все поля должны быть заполнены!</div>';
        
    }elseif(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email)){
        
        echo '<div id="profile_message" style="color: red">Некорректный email!</div>';
        
    }else{
        
        $result = mysqli_query ($link, "UPDATE `users`
        SET `user_surname` = '". $surname ."', `user_name` = '". $name ."', `user_phone` = '". $phone ."', `user_email` = '". $email ."', `user_login` = '" . $login ."'
        WHERE `user_login` = '". $session_login ."'") or die("Ошибка: " . mysqli_error($link));
        
        if($result == true){
            $result = mysqli_query ($link, "
    SELECT * FROM `users`
    WHERE `user_login` = '" . $login . "'") or die("Ошибка: " . mysqli_error($link));
            $row = mysqli_fetch_array($result);
            $_SESSION['auth'] ="yes_auth";
            $_SESSION['auth_name'] = $row['user_name'];
            $_SESSION['auth_surname'] = $row['user_surname'];
            $_SESSION['auth_phone'] = $row['user_phone'];
            $_SESSION['auth_email'] = $row['user_email'];
            $_SESSION['auth_role'] =  $row['user_role_id'];
            $_SESSION['auth_res_num'] =  $row['user_reservatoin_number'];
            $_SESSION['auth_login'] = $row['user_login'];
            $_SESSION['auth_pass'] =  $row['user_password'];
            echo 'true';
        };
    };
};
?>
