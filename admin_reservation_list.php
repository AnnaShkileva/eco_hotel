<?php session_start();
include "db.php" ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>ECO hotel</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header_style.css">
    <link rel="stylesheet" href="css/admin_reservation_list.css">
    <link rel="stylesheet" href="css/footer_style.css">
    <link rel="stylesheet" href="plugin/datepicker/jquery-ui.css">
    <link rel="stylesheet" href="css/nutrition.css">

</head>

<body>
    <div id="body">

        <?php
        include_once('include/header.php');
        ?>

        <div id="content">

            <h2>Список броней</h2>
            <table>
                <tr>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Дата прбытия</th>
                    <th>Дата отъезда</th>
                    <th>Номер</th>
                    <th>Тип питания</th>
                    <th>Количество гостей</th>
                    <th>Сумма</th>
                </tr>

                <?php
                
                $result = mysqli_query ($link, "
    SELECT * FROM `orders`, `users`
    WHERE `orders`.order_user_id = `users`.user_id
    ORDER BY `orders`.order_arrival_date DESC") or die("Ошибка " . mysqli_error($link));
$row = mysqli_fetch_array($result);
                echo '<tr>';
                do{
                    echo '<tr>
                    <td>'. $row['user_name'] .'</td>
                    <td>'. $row['user_surname'] .'</td>
                    <td>'. $row['order_arrival_date'] .'</td>
                    <td>'. $row['order_country_date'] .'</td>
                    <td>'. $row['order_room_id'] .'</td>
                    <td>'. $row['order_nutrition'] .'</td>
                    <td>'. $row['order_number_persons'] .'</td>
                    <td>'. $row['order_amount'] .'</td>
                    </tr>';
                }while($row = mysqli_fetch_array($result));
               
                ?>
            </table>

        </div>

        <?php
        include_once('include/footer.php');
        ?>

    </div>
</body>

</html>
