<?php session_start();?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>ECO hotel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header_style.css">
    <link rel="stylesheet" href="css/leisure.css">
    <link rel="stylesheet" href="css/footer_style.css">
    <link rel="stylesheet" href="plugin/datepicker/jquery-ui.css">
</head>

<body>
    <div id="body">

        <?php
        include_once('include/header.php');
        ?>

        <div id="content">
            <h2>Организация отдыха и развлечений</h2>
            <div id="img_leisure_1">
                <img src="images/leisure/pool.jpg" alt="Бассейн">
                <img src="images/leisure/spa.jpg" alt="Спа">
                <img src="images/leisure/sauna.jpg" alt="Сауна">
                <img src="images/leisure/billiards.jpg" alt="Бильярд">
            </div>
            <div>
                <p>Для получения полного релакса, на территории отеля представлен СПА-центр с: бассейном, джакузи, финской сауной и столами для бильярда.</p>
                <p>Любителям спорта есть возможность проводить время за занятиями в тренажерном зале, на теннисном корте, в зале для йоги, а также возможен прокат велосипедов.</p>
            </div>
            <div id="img_leisure_2">
                <img src="images/leisure/sport.jpg" alt="Тренажерный зал">
                <img src="images/leisure/tennis.jpg" alt="Тенисный корт">
                <img src="images/leisure/yoga.jpg" alt="Зал йоги">
                <img src="images/leisure/bike.jpg" alt="Велопрогулка">
            </div>
        </div>

        <?php
        include_once('include/footer.php');
        ?>

    </div>
</body>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

</html>
