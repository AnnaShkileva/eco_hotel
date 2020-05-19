<?php session_start();
include "db.php" 
    ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>ECO hotel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header_style.css">
    <link rel="stylesheet" href="css/footer_style.css">
    <link rel="stylesheet" href="css/room.css">
    <link rel="stylesheet" href="plugin/datepicker/jquery-ui.css">
</head>

<body>
    <div id="body">

        <?php
        include_once('include/header.php');
        ?>

        <div id="content">
            <h2>Номерной фонд</h2>
            <div id="lux_block">
                <h3>Люкс</h3>
                <?php
        
                $result = mysqli_query ($link, "
    SELECT `rooms`.room_name_id, `room_images`, `room_name`.id, `room_name_description` FROM `rooms`, `room_name`
    WHERE `rooms`.room_name_id = `room_name`.id
    AND room_name_id = 1 LIMIT 1") or die("Ошибка " . mysqli_error($link));
$row = mysqli_fetch_array($result);
                echo '<div><p>' . $row['room_name_description'] . '</p></div>';
                do{
                    
                    $img1 = strstr($row['room_images'],",", true);
                    $img2 = substr(strstr($row['room_images'],","),1);
                    echo '
                     <div>
                    <img src="'. $img1 . '" class="img_room">
                    <img src="'. $img2 . '" class="img_room">
                    </div>';
                }while($row = mysqli_fetch_array($result));
            
            ?>
                <h3>Стандарт</h3>
                <?php
            
                $result = mysqli_query ($link, "
    SELECT `rooms`.room_name_id, `room_images`, `room_name`.id, `room_name_description` FROM `rooms`, `room_name`
    WHERE `rooms`.room_name_id = `room_name`.id
    AND room_name_id = 2 LIMIT 1") or die("Ошибка " . mysqli_error($link));
                $row = mysqli_fetch_array($result);
                echo '<div><p>' . $row['room_name_description'] . '</p></div>';
                do{
                    
                    $img1 = strstr($row['room_images'],",", true);
                    $img2 = substr(strstr($row['room_images'],","),1);
                    echo '
                     <div>
                    <img src="'. $img1 . '" class="img_room">
                    <img src="'. $img2 . '" class="img_room">
                    </div>';
                }while($row = mysqli_fetch_array($result));
            
            ?>

                <h3>Эконом</h3>
                <?php
            
                $result = mysqli_query ($link, "
    SELECT `rooms`.room_name_id, `room_images`, `room_name`.id, `room_name_description` FROM `rooms`, `room_name`
    WHERE `rooms`.room_name_id = `room_name`.id
    AND room_name_id = 3 LIMIT 1") or die("Ошибка " . mysqli_error($link));
                $row = mysqli_fetch_array($result);
                echo '<div><p>' . $row['room_name_description'] . '</p></div>';
                do{
                    
                    $img1 = strstr($row['room_images'],",", true);
                    $img2 = substr(strstr($row['room_images'],","),1);
                    echo '
                     <div>
                    <img src="'. $img1 . '" class="img_room">
                    <img src="'. $img2 . '" class="img_room">
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

</html>
