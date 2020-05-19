<?php session_start();
include "db.php" ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>ECO hotel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header_style.css">
    <link rel="stylesheet" href="css/profile_history.css">
    <link rel="stylesheet" href="css/footer_style.css">
    <link rel="stylesheet" href="plugin/datepicker/jquery-ui.css">
</head>

<body>
    <div id="body">

        <?php
        include_once('include/header.php');
        ?>

        <div id="content">


            <div>
                <h2>Ваши бронирования</h2>
                <div id="table_block">
                    <table>
                        <tr>
                            <th>Дата прибытия</th>
                            <th>Дата отъезда</th>
                            <th>Класс номера</th>
                            <th>Тип питания</th>
                            <th>Количество гостей</th>
                            <th>Сумма в рублях</th>
                        </tr>
                        <?php
            $id = $_SESSION['auth_id'];
            $result = mysqli_query ($link, "SELECT * FROM `orders`, `rooms`, `room_name`
            WHERE `orders`.order_user_id = '". $id ."'
            AND `orders`.order_room_id = `rooms`.room_id
            AND `room_name`.id = `room_name_id`") or die("Ошибка " . mysqli_error($link));
            $row = mysqli_fetch_array($result);
                do{
                   
                    echo '<tr><td>'. $row['order_arrival_date'] .'</td><td>'. $row['order_country_date'] .'</td><td>'. $row['room_name_name'] .'</td><td>'. $row['order_nutrition'] .'</td><td>'. $row['order_number_persons'] .'</td><td>'. $row['order_amount'] .'</td></tr>';
                }while($row = mysqli_fetch_array($result));
            
            ?>
                    </table>
                </div>
            </div>
        </div>

        <?php
        include_once('include/footer.php');
        ?>

    </div>
</body>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

</html>
