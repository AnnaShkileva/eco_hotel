$("#btn_red_data").on('click', function () {
    $("#data_list").css({
        "display": "none"
    });
    $("#red_data").css({
        "display": "block"
    });
});
$("#btn_red_pass").on('click', function () {
    $("#btns").css({
        "display": "none"
    });
    $("#red_pass").css({
        "display": "block"
    });
});

$("#cancel_red_pass").on('click', function () {
    $("#red_pass").css({
        "display": "none"
    });
    $("#btns").css({
        "display": "block"
    });
});
$("#cancel_red_data").on('click', function () {
    $("#red_data").css({
        "display": "none"
    });
    $("#btns").css({
        "display": "block"
    });
})



$("#btn_saved_pass").on('click', function () {
    $session_login = $("#session_login").text();
    $red_pass = $("#text_pass").val();
    if ($red_pass == 0) {
        $("#content").append('<div id="profile_message" style="color: red">Новый пароль не введен!</div>')
        $("#profile_message").hide();
        $("#profile_message").fadeIn(300);
        $("#profile_message").delay(1000).fadeOut(300);
    } else {
        $.ajax({
            url: "./functions/profile_red_pass.php",
            type: 'post',
            data: {
                pass: $red_pass,
                login: $session_login

            },
            dataType: 'html',
            success: function (text) {
                if (text == "true") {
                    $("#content").append('<div id="profile_message">Новый пароль успешно сохранен!</div>');
                    $("#profile_message").hide();
                    $("#profile_message").fadeIn(300);
                    $("#profile_message").delay(1000).fadeOut(300);

                    $("#red_pass").css({
                        "display": "none"
                    });
                    $("#btns").css({
                        "display": "block"
                    });
                };
            }
        });
    };
});

$("#btn_saved_data").on('click', function (e) {
    e.preventDefault();
    $red_surname = $("#text_surname").val();
    $red_name = $("#text_name").val();
    $red_phone = $("#text_phone").val();
    $red_email = $("#text_email").val();
    $red_login = $("#text_login").val();
    $.ajax({
        url: "./functions/profile_red_data.php",
        type: 'post',
        data: {
            surname: $red_surname,
            name: $red_name,
            phone: $red_phone,
            email: $red_email,
            login: $red_login

        },
        dataType: 'html',
        success: function (text) {
            if (text == "true") {
                location.reload();
            } else {
                $("#content").append('<div id="profile_data_message">Ваши данные успешно обновлены!</div>');
                $("#profile_data_message").hide();
                $("#profile_data_message").fadeIn(300);
                $("#profile_data_message").delay(1000).fadeOut(300);
                location.reload();
            };
        }
    });

});
