<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    include "../db.php";
    
    $user = $_SESSION['auth_id'];
    $number = $_POST['number'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $nutrition = $_POST['nutrition'];
    $room = $_POST['room'];
    $sum = $_POST['sum'];
    
    $result = mysqli_query ($link, "INSERT INTO `orders` (`order_user_id`, `order_room_id`, `order_nutrition`, `order_arrival_date`, `order_country_date`, `order_number_persons`, `order_amount`) values ('". $user ."', '". $room ."', '". $nutrition ."', '". $date1 ."', '". $date2 ."', '". $number ."', '". $sum ."')") or die("Ошибка: " . mysqli_error($link));
        
        if($result == true){
            echo 'true';
        }else{
            echo 'Произошла ошибка! Пожалуйста, обратитесь в Службу бронирования!';
        };
};
?>
