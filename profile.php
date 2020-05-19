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
    <link rel="stylesheet" href="css/prifile.css">
</head>

<body>
    <div id="body">

        <?php
        include_once('include/header.php');
        ?>

        <div id="content">
            <div id="data_list">
                <h2>Ваши данные</h2>
                <div>
                    <div>Фамилия имя:</div>
                    <div>
                        <div id="session_surname"><?=$_SESSION['auth_surname']?></div>
                        <div id="session_name"><?=$_SESSION['auth_name']?></div>
                    </div>
                </div>
                <div>
                    <div>Телефон:</div>
                    <div id="session_phone"><?=$_SESSION['auth_phone']?></div>
                </div>
                <div>
                    <div>Email:</div>
                    <div id="session_email"><?=$_SESSION['auth_email']?></div>
                </div>
                <div>
                    <div>Логин:</div>
                    <div id="session_login"><?=$_SESSION['auth_login']?></div>
                </div>
                <div id="btns">
                    <button id="btn_red_data">Редактировать</button>
                    <button id="btn_red_pass">Сменить пароль</button>
                </div>
                <div id="red_pass">
                    <input type="text" id="text_pass" placeholder="Введите новый пароль">
                    <button id="btn_saved_pass" class="btn">Сохранить</button>
                    <button id="cancel_red_pass" class="btn">Отмена</button>
                </div>

            </div>
            <div id="red_data">
                <h2>Редактирование</h2>
                <form action="">
                    <input id="text_surname" type="text" value="<?=$_SESSION['auth_surname']?>">
                    <input id="text_name" type="text" value="<?=$_SESSION['auth_name']?>">
                    <input id="text_phone" type="text" value="<?=$_SESSION['auth_phone']?>">
                    <input id="text_email" type="text" value="<?=$_SESSION['auth_email']?>">
                    <input id="text_login" type="text" value="<?=$_SESSION['auth_login']?>">
                    <input type="submit" id="btn_saved_data" class="btn" value="Сохранить">
                    <button id="cancel_red_data" class="btn">Отмена</button>
                </form>
            </div>


        </div>

        <?php
        include_once('include/footer.php');
        ?>

    </div>
</body>
<script src="script/profile.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="plugin/datepicker/jquery-1.12.4.js"></script>
</html>
