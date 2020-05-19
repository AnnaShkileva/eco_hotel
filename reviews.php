<?php session_start();
include "db.php" ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>ECO hotel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header_style.css">
    <link rel="stylesheet" href="css/footer_style.css">
    <link rel="stylesheet" href="css/reviews.css">
    <link rel="stylesheet" href="plugin/datepicker/jquery-ui.css">
</head>

<body>
    <div id="body">

        <?php
        include_once('include/header.php');
        ?>

        <div id="content">

            <h2>Отзывы наших гостей</h2>
            <div id="reviews_list">
                <?php
            
                $result = mysqli_query ($link, "SELECT `user_id`,`user_login`, `review_user_id`, `review_text`,`review_date` FROM `reviews`, `users` 
                WHERE `review_user_id` = `user_id`
                ORDER BY `review_date` DESC") or die("Ошибка " . mysqli_error($link));
                $row = mysqli_fetch_array($result);
                    do{
                        $user = $row['user_login'];
                        $review = $row['review_text'];
                        $data = $row['review_date'];
                        echo '
                         <div class="review_block">
                        <span class="user">'. $user .'</span>
                        <span>'. $data .'</span>
                        <div class="review">'. $review .'</div>
                        </div>';
                    }while($row = mysqli_fetch_array($result));

                ?>
            </div>
        </div>

        <?php
        include_once('include/footer.php');
        ?>

    </div>
</body>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>


</html>
