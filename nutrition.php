<?php session_start();?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>ECO hotel</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header_style.css">
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
            <div id="restaurant">
                <div>
                    <h2>Варианты организации питания</h2>
                    <ul id="list_nutrition">
                        <li>RO &mdash; Без питания</li>
                        <li>BB &mdash; Завтраки</li>
                        <li>HB &mdash; Полупансион</li>
                        <li>FB &mdash; Полный пансион</li>
                        <li>AL &mdash; Все включено</li>
                    </ul>
                </div>
                <div id="description">
                    <p>Идеальным началом дня будет завтрак в ресторане отеля: вкуснейшие сырники, омлеты, каши, блинчики и ароматный кофе - всё это и многое другое Вы найдете в утреннем меню.</p>
                    <p>Каждый будний день с 12:00 до 17:00 - бизнес ланч в нашем ресторане - отличный вариант для тех, кто ценит свое время. Ежедневно к обеду повара ресторана пекут свежие пшеничные булочки.</p>
                    <p>В меню ресторана собраны традиционные блюда европейской и русской кухонь в ярком авторском исполнении.</p>
                </div>
            </div>
            <div>
                <h2>Примеры блюд шведского стола</h2>
                <div id="food_block">
                    <div class="food">
                        <h3>Завтрак</h3>
                        <img src="images/nutrition/breakfast1.jpg" class="img_food">
                        <img src="images/nutrition/breakfast2.jpg" class="img_food">
                    </div>
                    <div class="food">
                        <h3>Обед</h3>
                        <img src="images/nutrition/lunch1.jpg" class="img_food">
                        <img src="images/nutrition/lunch2.jpg" class="img_food">

                    </div>
                    <div class="food">
                        <h3>Ужин</h3>
                        <img src="images/nutrition/dinner1.jpg" class="img_food">
                        <img src="images/nutrition/dinner2.jpg" class="img_food">

                    </div>
                </div>
            </div>

        </div>

        <?php
        include_once('include/footer.php');
        ?>

    </div>
</body>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="plugin/datepicker/jquery-1.12.4.js"></script>

</html>
