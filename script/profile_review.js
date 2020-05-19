$('#btn_new_review').on('click', function (e) {
    e.preventDefault();
    $text = $("#text_new_review").val();
    $.ajax({
        url: "./functions/profile_new_review.php",
        type: 'post',
        data: {
            text: $text
        },
        dataType: 'html',
        success: function (text) {
            if (text == 'true') {
                location.reload();
            }
        }
    })
});
