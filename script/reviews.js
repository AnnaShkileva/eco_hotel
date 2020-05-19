$("#reviews_list").ready(function () {

    $(".review_block").slice(2).hide();
    var $a = 0;
    $("#btn_review1").attr("class", $a);
    $("#btn_review1").on('click', function () {
        $(this).attr("class", $a)
        if ($('#btn_review2').length <= 0) {
            $(this).before("<button id='btn_review2'><< Назад</button>")
        }
        if ($('#btn_review2').hide()) {
            $('#btn_review2').show();
        }
        $b = $a + 2;
        $c = $b + 2;
        $(".review_block").slice($a, $b).hide();
        $(".review_block").slice($b, $c).show();
        $(".review_block").slice($c).hide();
        $a = $a + 2
        $(this).attr("class", $a);
    })

    $(document).on('click', "#btn_review2", function () {
        ("#btn_review1").attr("class", $a);
        if ($("#btn_review1").attr("class") == '2') {
            $("#btn_review2").hide();
        }
        $a = $("#btn_review1").attr("class");
        $a = $a - 2;
        $b = $a + 2;
        $c = $b + 2;
        $(".review_block").slice($a, $b).hide();
        $(".review_block").slice($b, $c).show();
        $(".review_block").slice($c).hide();

        $("#btn_review1").attr("class", $a)

    })


});
