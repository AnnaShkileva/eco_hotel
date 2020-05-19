<?php session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "../db.php";

    $id = $_SESSION['auth_id'];
    $text = $_POST['text'];
    
    $result = mysqli_query ($link, "INSERT INTO `reviews` (`review_user_id`, `review_text`) values ('". $id ."', '". $text ."')") or die("Ошибка: " . mysqli_error($link));
        
        if($result == true){
            echo 'true';
        };
    
}
?>
