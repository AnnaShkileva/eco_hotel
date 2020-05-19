$('.s_plus_block').on('click', function () {
    $(this).css({
        'background-color': '#eee743'
    });
    $(this).addClass('s_active');
    $('.s_plus_block').not(this).css({
        'background-color': 'white'
    });
    $('.s_plus_block').not(this).removeClass('s_active');
});

$('#img_one').on('click', function () {
    $(this).css({
        'background-color': '#eee743'
    });
    $(this).addClass('s_active');
    $('#img_two').css({
        'background-color': 'white'
    });
    $('#img_two').removeClass('s_active');
});

$('#img_two').on('click', function () {
    $(this).css({
        'background-color': '#eee743'
    });
    $(this).addClass('s_active');
    $('#img_one').css({
        'background-color': 'white'
    });
    $('#img_one').removeClass('s_active');
});

$('.s_nutrition').on('click', function () {
    $(this).css({
        'background-color': '#eee743'
    });
    $(this).addClass('s_active');
    $('.s_nutrition').not(this).css({
        'background-color': 'white'
    });
    $('.s_nutrition').not(this).removeClass('s_active');
});

$("#btn_to_book").on('click', function () {
    var $img = $('.img_person').filter('.s_active').prop('id');
    var $user_name = $('#user_name').text();
    var $date_1 = $('#date_1').val();
    var $date_2 = $('#date_2').val();
    var $room = $('.s_plus_block').filter('.s_active').prop('id');
    var $sum;
    var $nutrition = $('.s_nutrition').filter('.s_active').attr('for');

    $room_name = $room.split('_')[0];

    $nutrition = $nutrition.replace(/\D+/g, '');

    var $confirmation = "<div id='confirmation'><h3>Подтвердите бронирование:</h3><p>" + $user_name + "</p><p>Проживание: C " + $date_1 + " ПО " + $date_2 + " </p><p>Тип питания: " + nutrition_name($nutrition) + "</p><p>Гостей: " + images($img) + " человек</p><p>Номер: " + room_name($room_name) + "<p id='sum'>Сумма: " + sum($img, $date_1, $date_2, $nutrition, $room_name, $sum) + " рублей</p><div><button id='enter_confirmation'>Подтвердить</button><button id='cancel_confirmation'>Отмена</button></div></div>"
    $('#content').append($confirmation);

    function images($img) {
        if ($img == 'img_one') {
            return '1'
        } else if ($img == 'img_two') {
            return '2'
        } else {
            return 'Ошибка!'
        }
    }

    function room_name($room_name) {
        if ($room_name == 'lux') {
            return 'Люкс'
        } else if ($room_name == 'standard') {
            return 'Стандарт'
        } else if ($room_name == 'econom') {
            return 'Эконом'
        } else {
            return 'Ошибка!'
        }
    }

    function nutrition_name($nutrition) {
        if ($nutrition == '1') {
            return "RO"
        } else if ($nutrition == '2') {
            return "BB"
        } else if ($nutrition == '3') {
            return "HB"
        } else if ($nutrition == '4') {
            return "FB"
        } else if ($nutrition == '5') {
            return "AL"
        } else {
            return "Ошибка!"
        }
    }

    function sum($img, $date_1, $date_2, $nutrition, $room_name, $sum) {

        if ($nutrition == '1') {
            $sum = 0;
            $nutrition = 'RO'
        } else if ($nutrition == '2') {
            $sum = 200;
            $nutrition = 'BB'
        } else if ($nutrition == '3') {
            $sum = 500;
            $nutrition = 'HB'
        } else if ($nutrition == '4') {
            $sum = 800;
            $nutrition = 'FB'
        } else if ($nutrition == '5') {
            $sum = 1000;
            $nutrition = 'AL'
        } else {
            return "Ошибка!"
        }

        if ($img == 'img_one') {
            $sum = $sum * 1;
        } else if ($img == 'img_two') {
            $sum = $sum * 2
        } else {
            return 'Ошибка!'
        }

        if ($room_name == 'lux') {
            $sum = $sum + 5000
        } else if ($room_name == 'standard') {
            $sum = $sum + 4000
        } else if ($room_name == 'econom') {
            $sum = $sum + 3000
        } else {
            return 'Ошибка!'
        }

        $year_1 = $date_1.substr(6);
        $year_2 = $date_2.substr(6);

        $month_1 = $date_1.substr(7, 2);
        $month_2 = $date_2.substr(7, 2);

        $day_1 = $date_1.substr(0, 2);
        $day_2 = $date_2.substr(0, 2);
        var $date_1_new = new Date($year_1, $month_1, $day_1);
        var $date_2_new = new Date($year_2, $month_2, $day_2);
        var $date = new Date($date_2_new - $date_1_new);
        var $days = $date / 1000 / 60 / 60 / 24;
        $sum = $sum * $days;
        return $sum;
    }
    $("#cancel_confirmation").on('click', function () {
        $('#confirmation').remove();

    });

    $("#enter_confirmation").on('click', function () {
        if ($img == 'img_one') {
            $number = 1;
        } else {
            $number = 2;
        };

        if ($nutrition == '1') {
            $nutrition = "RO"
        } else if ($nutrition == '2') {
            $nutrition = "BB"
        } else if ($nutrition == '3') {
            $nutrition = "HB"
        } else if ($nutrition == '4') {
            $nutrition = "FB"
        } else {
            $nutrition = "AL"
        };

        $year_1 = $date_1.substr(6);
        $year_2 = $date_2.substr(6);

        $month_1 = $date_1.substr(7, 2);
        $month_2 = $date_2.substr(7, 2);

        $day_1 = $date_1.substr(0, 2);
        $day_2 = $date_2.substr(0, 2);
        var $date_1_db = $year_1 + '-' + $month_1 + '-' + $day_1;
        var $date_2_db = $year_2 + '-' + $month_2 + '-' + $day_2;

        $room_id = $room.replace(/\D+/g, '');
        $sum = $('#sum').text();
        $sum = $sum.replace(/\D+/g, '');
        $.ajax({
            url: "./functions/selection_book.php",
            type: 'post',
            data: {
                number: $number,
                date1: $date_1_db,
                date2: $date_2_db,
                nutrition: $nutrition,
                room: $room_id,
                sum: $sum
            },
            dataType: 'html',
            success: function (text) {
                $('#confirmation').remove();
                if (text == "true") {
                    $('#finish_message').append("Бронирование номера прошло успешно!<br> Будем рады видеть Вас!");
                    $('#finish_message').fadeIn(300);
                    $("#finish_message").delay(1000).fadeOut(300);
                    location.reload();

                } else {
                    $('#finish_message').append(text);
                    $('#finish_message').show();
                };
            }
        });

    });
});
