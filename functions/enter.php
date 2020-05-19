<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "../db.php";
    
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    
    $check = $_POST['check'];
    if($check == 'yes'){
            setcookie('user', $login . "+" . $pass, time() +3600*24*365, "/");
    }
    
    $result = mysqli_query ($link, "
    SELECT * FROM `users`
    WHERE `user_login` = '" . $login . "'") or die("Ошибка: " . mysqli_error($link));
    $row = mysqli_fetch_array($result);
    
    $user_pass = $row['user_password'];
    
    if($row == 0){
        echo "Пользователь не найден!";
        
    }elseif($pass != $user_pass){
        echo "Введен неверный логин или пароль!";
        
    }else{
        session_start();
        $_SESSION['auth'] ="yes_auth";
        $_SESSION['auth_id'] = $row['user_id'];
        $_SESSION['auth_name'] = $row['user_name'];
        $_SESSION['auth_surname'] = $row['user_surname'];
        $_SESSION['auth_phone'] = $row['user_phone'];
        $_SESSION['auth_email'] = $row['user_email'];
        $_SESSION['auth_role'] =  $row['user_role_id'];
        $_SESSION['auth_login'] = $row['user_login'];
        $_SESSION['auth_pass'] =  $row['user_password'];
            
        echo "true";
        
    };
};
?>
