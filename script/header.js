$("#user").on('click', function () {
    if ($("#lk_user").css("display", "none")) {
        $("#lk_user").css({
            "display": "block"
        });
    };
});

$("#enter").children("button").on("click", function () {
    $("#enter_form").css({
        "display": "block"
    });
});

$("#registration").on("click", function () {
    $("#registretion_form").css({
        "display": "block"
    });
});

$(document).on("mouseup", function (e) {

    if ($("#lk_user").css("display") == "block") {
        var div = $("#lk_user");
        if (!div.is(e.target) && div.has(e.target).length === 0) {
            $("#lk_user").css({
                "display": "none"
            });
        };
    };

    if ($("#enter_form").css("display") == "block") {
        var div1 = $("#enter_form");
        if (!div1.is(e.target) && div1.has(e.target).length === 0) {
            $("#enter_form").css({
                "display": "none"
            });
        };
    };
    if ($("#registretion_form").css("display") == "block") {
        var div2 = $("#registretion_form");
        if (!div2.is(e.target) && div2.has(e.target).length === 0) {
            $("#registretion_form").css({
                "display": "none"
            });
        };
    };

});


$("#enter_button").on('click', function (e) {
    e.preventDefault();
    if ($("#option").prop('checked')) {
        $check = 'yes';
    } else {
        $check = 'no';
    }
    $("#alert1").css({
        "display": "none"
    });
    $("#alert1").empty();
    $login = $("#enter_login").val();
    $pass = $("#enter_pass").val();
    $.ajax({
        url: "./functions/enter.php",
        type: 'post',
        data: {
            login: $login,
            pass: $pass,
            check: $check
        },
        dataType: 'html',
        success: function (text) {
            if (text != "true") {
                $("#alert1").css({
                    "display": "block"
                });
                $("#alert1").append(text);
            } else {
                location.reload();

            }
        }
    })
})

$("#reg_login").keyup(function () {
    $("#alert_login").css({
        "display": "none"
    })
    $("#alert_login").empty();
    var $val = $(this).val();
    $.ajax({
        url: "./functions/registration.php",
        type: 'post',
        data: {
            data: $val,
            func: "login"
        },
        dataType: 'html',
        success: function (text) {
            if (text != 'true') {
                $("#alert_login").css({
                    "display": "block"
                })
                $("#alert_login").append(text);
            };
        }
    });
});

$("#reg_phone").keyup(function () {
    $("#alert_phone").css({
        "display": "none"
    })
    $("#alert_phone").empty();
    var $val = $(this).val();
    $.ajax({
        url: "./functions/registration.php",
        type: 'post',
        data: {
            data: $val,
            func: "phone"
        },
        dataType: 'html',
        success: function (text) {
            if (text != 'true') {
                $("#alert_phone").css({
                    "display": "block"
                })
                $("#alert_phone").append(text);
            };
        }
    });
});

$("#reg_email").keyup(function () {
    $("#alert_email").css({
        "display": "none"
    })
    $("#alert_email").empty();
    var $val = $(this).val();
    $.ajax({
        url: "./functions/registration.php",
        type: 'post',
        data: {
            data: $val,
            func: "email"
        },
        dataType: 'html',
        success: function (text) {
            if (text != 'true') {
                $("#alert_email").css({
                    "display": "block"
                })
                $("#alert_email").append(text);
            };
        }
    });
});
$("#registretion_button").on('click', function (e) {
    e.preventDefault();

    $("#alert2").css({
        "display": "none"
    });
    $("#alert2").empty();
    $login = $("#reg_login").val();
    $pass = $("#reg_pass").val();
    $name = $("#reg_name").val();
    $surname = $("#reg_name").val();
    $phone = $("#reg_phone").val();
    $email = $("#reg_email").val();
    $.ajax({
        url: "./functions/registration.php",
        type: 'post',
        data: {
            login: $login,
            pass: $pass,
            name: $name,
            surname: $surname,
            phone: $phone,
            email: $email,
            func: 'reg'
        },
        dataType: 'html',
        success: function (text) {
            if (text != "true") {
                $("#alert2").css({
                    "display": "block"
                });
                $("#alert2").append(text);
            } else {
                $("#registretion_form").css({
                    "display": "none"
                });

                $("#message").css({
                    "display": "block"
                });
                $("#forms").append('<div id="message">Вы успешно зарегистированны!</div>');
                $("#message").hide();
                $("#message").fadeIn(300);
                $("#message").delay(1000).fadeOut(300);

            }
        }
    })
});

$('#submit_selection').on('click', function (e) {
    var $data1 = $('#date_1').val();
    var $data2 = $('#date_2').val();
    if ($data1 == 0 || $data2 == 0) {
        e.preventDefault();
        $('#selection').append('<div id="warning">Укажите интересующие даты!</div>');
        $("#message").hide();
        $("#message").fadeIn(300);
        $("#message").delay(1000).fadeOut(300);
    } else {
        $('#selection').submit();
    }

});
