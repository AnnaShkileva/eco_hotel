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
    <link rel="stylesheet" href="css/selection.css">
    <link rel="stylesheet" href="./plugin/datepicker/jquery-ui.css">
</head>

<body>
    <div id="body">

        <?php
        include_once('include/header.php');
        ?>

        <div id="content">
           
           
            <?php 
            if(isset($_SESSION['auth']) && $_SESSION['auth']=="yes_auth"){
            echo "<h2>Выберите количество гостей <h2>
            <div class='img_person' id='img_one'><img src='images/selection/one.png'></div>
            <div class='img_person' id='img_two'><img src='images/selection/two.png'></div>
            <h2>Варианты организации питания</h2>
                    <div id='selection_nutrition'>
                        <input type='radio' name='nutrition' value='ro' id='radio1'><label for='radio1' class='s_nutrition'>RO &mdash; Без питания</label><span>0 руб/чел</span><br>
                        <input type='radio' name='nutrition' value='bb' id='radio2'><label for='radio2' class='s_nutrition'>BB &mdash; Завтраки</label><span>200 руб/чел</span><br>
                        <input type='radio' name='nutrition' value='hb' id='radio3'><label for='radio3' class='s_nutrition'>HB &mdash; Полупансион</label><span>500 руб/чел</span><br>
                        <input type='radio' name='nutrition' value='fb' id='radio4'><label for='radio4' class='s_nutrition'>FB &mdash; Полный пансион</label><span>800 руб/чел</span><br>
                        <input type='radio' name='nutrition' value='al' id='radio5'><label for='radio5' class='s_nutrition'>AL &mdash; Все включено</label><span>1000 руб/чел</span><br>
                    </div>";
            }else{
                echo "<h3 id='authorization_warning'>Внимание! Для бронирования необходимо авторизироваться</h3>";
            }?>
            <h2>Номера свободные к бронированию</h2>
            <div id="selection_block">
                <?php
                
                function button_lux($id){
                    if(isset($_SESSION['auth']) && $_SESSION['auth']=="yes_auth"){
            return '<div class="s_plus_block" id="lux_'. $id .'">+</div>';}
                }
                function button_standard($id){
                    if(isset($_SESSION['auth']) && $_SESSION['auth']=="yes_auth"){
            return '<div class="s_plus_block" id="standard_'. $id .'">+</div>';}
                }
                function button_econom($id){
                    if(isset($_SESSION['auth']) && $_SESSION['auth']=="yes_auth"){
            return '<div class="s_plus_block" id="econom_'. $id .'">+</div>';}
                }
                
                $date1 = $_POST['date_1'];
                $date1_day = substr($date1,0,-8);
                $date1_month = substr(substr($date1,0,-5),3);
                $date1_year = substr($date1,6);
                $date1_db = $date1_year . "-" . $date1_month . "-" . $date1_day;
                
                $date2 = $_POST['date_2'];
                $date2_day = substr($date2,0,-8);
                $date2_month = substr(substr($date2,0,-5),3);
                $date2_year = substr($date2,6);
                $date2_db = $date1_year . "-" . $date2_month . "-" . $date2_day;
                
                    
                $result = mysqli_query ($link, "
                    SELECT * FROM `rooms`,`room_name`
                    WHERE NOT EXISTS (SELECT * FROM `orders`
                    WHERE `orders`.`order_room_id` = `rooms`.`room_id`
                    AND DATE(`orders`.`order_arrival_date`) BETWEEN '". $date1_db ."' AND '". $date2_db ."')
                    AND `rooms`.`room_name_id` = `room_name`.`id` AND `room_name`.`id` = 1
                    ORDER BY `room_id`") or die("Ошибка " . mysqli_error($link));
                $row = mysqli_fetch_array($result);
                
                if ($row !=''){
                    
                    echo '<div class="room_class_block">' . $row['room_name_name'] . ' <span class="price">'. $row['room_price'] .' рублей</span></div>';
                    
                    do{

                        $img1 = strstr($row['room_images'],",", true);
                        $img2 = substr(strstr($row['room_images'],","),1);
                        echo '
                         <div class="room_block">
                        <img src="'. $img1 . '" class="room_img">
                        <img src="'. $img2 . '" class="room_img">
                        '. button_lux($row['room_id']) .'
                        </div>';
                    }while($row = mysqli_fetch_array($result));
                };
                
                
                $result = mysqli_query ($link, "
                    SELECT * FROM `rooms`,`room_name`
                    WHERE NOT EXISTS (SELECT * FROM `orders`
                    WHERE `orders`.`order_room_id` = `rooms`.`room_id`
                    AND DATE(`orders`.`order_arrival_date`) BETWEEN '". $date1_db ."' AND '". $date2_db ."')
                    AND `rooms`.`room_name_id` = `room_name`.`id` AND `room_name`.`id` = 2
                    ORDER BY `room_id`") or die("Ошибка " . mysqli_error($link));
                $row = mysqli_fetch_array($result);
                
                if ($row !=''){
                    
                    echo '<div class="room_class_block">' . $row['room_name_name'] . ' <span class="price">'. $row['room_price'] .' рублей</span></div>';
                    
                    do{

                        $img1 = strstr($row['room_images'],",", true);
                        $img2 = substr(strstr($row['room_images'],","),1);
                        echo '
                         <div class="room_block">
                        <img src="'. $img1 . '" class="room_img">
                        <img src="'. $img2 . '" class="room_img">
                        '. button_standard($row['room_id']) .'
                        </div>';
                    }while($row = mysqli_fetch_array($result));
                };
                
                $result = mysqli_query ($link, "
                    SELECT * FROM `rooms`,`room_name`
                    WHERE NOT EXISTS (SELECT * FROM `orders`
                    WHERE `orders`.`order_room_id` = `rooms`.`room_id`
                    AND DATE(`orders`.`order_arrival_date`) BETWEEN '". $date1_db ."' AND '". $date2_db ."')
                    AND `rooms`.`room_name_id` = `room_name`.`id` AND `room_name`.`id` = 3
                    ORDER BY `room_id`") or die("Ошибка " . mysqli_error($link));
                $row = mysqli_fetch_array($result);
                
                if ($row !=''){
                    
                    echo '<div  class="room_class_block">' . $row['room_name_name'] . ' <span class="price">'. $row['room_price'] .' рублей</span></div>';
                    
                    do{

                        $img1 = strstr($row['room_images'],",", true);
                        $img2 = substr(strstr($row['room_images'],","),1);
                        echo '
                         <div class="room_block">
                        <img src="'. $img1 . '" class="room_img">
                        <img src="'. $img2 . '" class="room_img">
                        '. button_econom($row['room_id']) .'
                        </div>';
                    }while($row = mysqli_fetch_array($result));
                };
            
                
                if(isset($_SESSION['auth']) && $_SESSION['auth']=="yes_auth"){
                echo '<button id="btn_to_book">Забронировать</button>';
                }
                    ?>
            </div>
            <div id="finish_message"></div>
        </div>

        <?php
        include_once('include/footer.php');
        ?>

    </div>
</body>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
    $(document).ready(function() {
        $("#date_1").val('<?php echo $date1?>');
        $("#date_2").val('<?php echo $date2?>');
    });

</script>
<script src="./script/selection.js"></script>

</html>
