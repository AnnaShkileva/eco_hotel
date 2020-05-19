<div id="header">

    <div id="header_top">
        <div>с.Солнечногорск<br>Республика Крым</div>
        <div id="label"><a href="index.php"><img src="images/label.png" alt="ECO" title="На главную"></a></div>

        <div>Служба бронирования<br>+7(999)999-99-99</div>
        <?php
        if(isset($_SESSION['auth']) && $_SESSION['auth'] == "yes_auth"){
            
            if($_SESSION['auth_id'] != 1){
                echo'<div id="user"><span class="link" id="user_name">'. $_SESSION['auth_name'] . " " . $_SESSION['auth_surname'] .'</span></div><div id="lk_user"><ul><li><a href="profile.php">Профиль</a></li><li><a href="profile_history.php">Бронирования</a></li><li><a href="profile_reviews.php">Мои отзывы</a></li><li id="exit""><span id="exit" class="link"><a href="functions/exit.php">Выход</a></span></li></ul></div>';
            }else{
                echo'<div id="user"><span class="link" id="user_name">'. $_SESSION['auth_name'] . " " . $_SESSION['auth_surname'] .'</span></div><div id="lk_user"><ul><li><a href="profile.php">Профиль</a></li><li><a href="admin_reservation_list.php">Бронирования</a></li><li id="exit""><span id="exit" class="link"><a href="functions/exit.php">Выход</a></span></li></ul></div>';   
            };
        }else{
        echo '<div id="enter"><button>Вход</button><div id="registration"><span class="link">Регистрация</span></div></div>';
            
        }; ?>

    </div>

    <div id="header_menu">
        <ul>
            <li><a href="rooms.php">Номера</a></li>
            <li><a href="nutrition.php">Питание</a></li>
            <li><a href="leisure.php">Досуг</a></li>
            <li><a href="reviews.php">Отзывы</a></li>
        </ul>


    </div>

    <div id="header_selection">

        <form action="selection.php" method="post" id="selection">

            <div>

                <input type="text" class="datepicker" id="date_1" name="date_1" placeholder="Дата прибытия" autocomplete="off">
            </div>

            <div>

                <input type="text" class="datepicker" id="date_2" name="date_2" placeholder="Дата отъезда" autocomplete="off">

            </div>

            <div class="btn_header" id="header_form_button">

                <button id="submit_selection">Подобрать номер</button>
            </div>
        </form>

    </div>

    <div id="forms">
        <div id="enter_form">
            <form action="">
                <h3>Авторизация</h3><br>
                <span>Логин </span><input type="text" id="enter_login"><br>
                <span>Пароль </span><input type="password" id="enter_pass"><br>
                <input type="checkbox" id="option"><label for="option" id="label_option">запомнить меня</label>
                <input type="submit" id="enter_button" class="btn_header" value="Войти">
                <div id="alert1">
                </div>

            </form>
        </div>
        <div id="registretion_form">
            <form action="functions/registration.php">
                <h3>Введите свои данные для регистрации</h3><br>
                <div id="alert2"></div>
                <span>Логин </span><input type="text" id="reg_login" autocomplete="off"><br>
                <div id="alert_login" class="alert"></div>
                <span>Имя </span><input type="text" id="reg_name" autocomplete="off"><br>
                <span>Фамилия </span><input type="text" id="reg_surname" autocomplete="off"><br>
                <span>Телефон </span><input type="text" id="reg_phone" autocomplete="off">
                <div id="alert_phone" class="alert"></div>
                <span>Email </span><input type="text" id="reg_email" autocomplete="off"><br>
                <div id="alert_email" class="alert"></div>
                <span>Пароль</span><input type="text" id="reg_pass" autocomplete="off"><br>
                <input type="submit" id="registretion_button" value="Сохранить">
            </form>

        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="plugin/datepicker/jquery-1.12.4.js"></script>
<script src="script/header.js"></script>
