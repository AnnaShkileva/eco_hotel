<?php
session_start();
include "db.php";

$login = $_SESSION['auth_login'];
$text = $_POST['data'];
$date = date(Y-m-d);
$result = mysqli_query ($link, "SELECT `user_id`,`user_login` FROM  `users`
            WHERE `user_login` = '". $login ."'") or die("Ошибка " . mysqli_error($link));
            $row = mysqli_fetch_array($result);
$id = $row['user_id'];

$result = mysqli_query ($link, "INSERT INTO `reviews` (`review_user_id`, `review_text`, `review_data`) values('". $id ."', '". $text ."', '". $date ."')") or die("Ошибка: " . mysqli_error($link));
        echo 'true';

?>
