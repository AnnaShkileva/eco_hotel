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
    <link rel="stylesheet" href="plugin/slaider/slaider_style.css">
</head>

<body>
    <div id="body">

        <?php
        include_once('include/header.php');
        
        ?>

        <div id="content">

            <div id="block-for-slider">
                <div id="viewport">
                    <ul id="slidewrapper">
                        <li class="slide"><img src="images/1.jpg" alt="1" class="slide-img"></li>
                        <li class="slide"><img src="images/2.jpg" alt="2" class="slide-img"></li>
                        <li class="slide"><img src="images/3.jpg" alt="3" class="slide-img"></li>
                    </ul>

                    <div id="prev-next-btns">
                        <div id="prev-btn"></div>
                        <div id="next-btn"></div>
                    </div>

                    <ul id="nav-btns">
                        <li class="slide-nav-btn"></li>
                        <li class="slide-nav-btn"></li>
                        <li class="slide-nav-btn"></li>

                    </ul>
                </div>
            </div>

            <div id="description">
                <h2>О нас</h2>
                <p>В с.Солнечногорск, что является небезызвестным курортом Республики Крым, расположился современный "ЭКО" отель. Он привлекает туристов благодаря своей развитой инфраструктуре, включающей в себя все составляющие, необходимые для максимально полноценного отдыха.</p>
                <p>Номерной фонд санатория включает в себя отличные номера нескольких типов. Для основного питания туристов на территории санатория предусмотрены хорошие столовые. Также, можно хорошо провести время в уютной обстановке баров или в пиццерии.Для интересного и разнообразного досуга туристов в санатории есть масса возможностей. Во время отдыха можно полноценно посещать бассейны и SPA-центр, заниматься спортом, йогой, а также ходить на экскурсии и многое другое.</p>
                <p>Всё это превратит отпуск в настоящую сказку, полную приключений, позитива и новых событий, которые оставят приятные воспоминания.</p>

            </div>
            <div id="address">
                <div>
                    <h2>Местоположение</h2>
                    <p>Наш адрес: Республика Крым, село Солнечногорское, улица Подгорная, дом 7.</p>
                    <p>Чтобы заказать трансфер, пожалуйста, свяжитесь по телефону с круглосуточной службой бронирования.</p>
                </div>
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2833.534302600999!2d34.540303811822504!3d44.74951697107508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40eb3f4889a527bd%3A0x95dcbfcc46156d13!2z0YPQuy4g0J_QvtC00LPQvtGA0L3QsNGPLCA3LCDQodC-0LvQvdC10YfQvdC-0LPQvtGA0YHQutC-0LU!5e0!3m2!1sru!2sru!4v1577606106323!5m2!1sru!2sru" width="100%" height="auto" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>

        <?php
        include_once('include/footer.php');
        ?>

    </div>
</body>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="plugin/datepicker/jquery-1.12.4.js"></script>
<script src="plugin/slaider/slaider_script.js"></script>

</html>
