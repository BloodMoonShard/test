function callback_send() {
    var msg = $('#form_callback').serialize();
    $.ajax({
        type: 'POST',
        url: '/admin/ajax/callback',
        data: msg,
        success: function () {
            $('#form_callback').hide();
            $('.load-gif').delay(200).fadeIn(300).delay(1500).fadeOut(400);
            $('.success-img').delay(2600).fadeIn(300);

        },
        error: function () {
            alert('Возникла ошибка');
        }
    });
}

function callback_send_v2() {
    var msg = $('#form_callback_v2').serialize();
    $.ajax({
        type: 'POST',
        url: '/admin/ajax/callback',
        data: msg,
        success: function () {
            $('.success-img-v2').delay(600).fadeIn(500);

        },
        error: function () {
            alert('Возникла ошибка');
        }
    });
}

function set_comparison(elem) {
    var flag = 0;
    var id = elem.val();

    if (elem.prop("checked")) {
        $("#label-" + id).text("Список сравнения").hide();
        $("#not_label-" + id).text("Список сравнения").show();
        flag = 1;
    } else {
        $("#not_label-" + id).hide();
        $("#label-" + id).text("Сравнить").show();
        flag = 0;
    }

    $.ajax({
        type: 'POST',
        url: '/ajax/comparison',
        data: 'id=' + id + '&flag=' + flag,
        dataType: 'json',
        success: function (response) {
            if (response.status) {
                $("#not_label-" + id).html($("#not_label-" + id).text()+'<span style="color: #EE4942;"> ('+response.size+')</span>');
            }
        },
        error: function () {
            alert('Возникла ошибка');
        }
    });
}

function unset_comparison(id) {

    $.ajax({
        type: 'POST',
        url: '/ajax/unset_comparison',
        data: 'id=' + id,
        dataType: 'JSON',
        success: function (response) {
            if (response.status) {
                $('#' + id).parent().remove();
                $('.object-' + id).remove();

                var count = $('#count_in_comp').text();
                count = count - 1;
                $('#count_in_comp').text(count);
            }
        },
        error: function () {
            alert('Возникла ошибка');
        }
    });
}

function show_hide(blockId) {
    if ($(blockId).css('display') == 'none') {
        $(blockId).animate({height: 'show'}, 500);
    }
    else {
        $(blockId).animate({height: 'hide'}, 500);
    }
}

function show_hide_filter(blockId) {
    if ($(blockId).css('display') == 'none') {
        $(blockId).animate({height: 'show'}, 500);
        console.log($(this));

        $(this).find("span").css('color', '#626262');
        $(this).find(".toggle-filter-icon").addClass("opened-filter");
    }
    else {
        $(blockId).animate({height: 'hide'}, 500);
        $(this).find("span").css('color', '#000');
        $(this).find(".toggle-filter-icon").removeClass("opened-filter");
    }
}

$(document).ready(function () {

    $(".to-list").click(function () {
        set_comparison($(this));
        console.log(111);
    });

    $(".close-co").click(function () {
        unset_comparison($(this).attr('id'));
    });

    $('.show_map').click(function () {
        $("#map-window").css('visibility', 'visible');
    });
    $('#close-map').click(function () {
        $("#map-window").css('visibility', 'hidden');
    });

    $('.show_contacts').click(function () {
        $("#contacts-window").css('visibility', 'visible');
    });
    $('#close-contacts').click(function () {
        $("#contacts-window").css('visibility', 'hidden');
    });

    $('.order_call').click(function () {
        $("#shadow-wrapper").show();
        $("#shadow-wrapper-body").show();
        $("#callback").show();
    });

    $('#close-callback').click(function () {
        $("#shadow-wrapper").hide();
        $("#shadow-wrapper-body").hide();
        $("#callback").hide();
    });

    $('#btn_send_resume').click(function () {
        $("#shadow-wrapper").show();
        $("#shadow-wrapper-body").show();
        $("#resume").show();
    });

    $('#close_resume').click(function () {
        $("#shadow-wrapper").hide();
        $("#shadow-wrapper-body").hide();
        $("#resume").hide();
    });

    $('#but-search-all').click(function () {
        $("#shadow-wrapper").show();
        $("#shadow-wrapper-body").show();
        $("#search-all").show();
    });
    $('#close-btn-search-all').click(function () {
        $("#shadow-wrapper").hide();
        $("#shadow-wrapper-body").hide();
        $("#search-all").hide();
    });

    $('#but-search-apart').click(function () {
        $("#shadow-wrapper").show();
        $("#shadow-wrapper-body").show();
        $("#search-apart").show();
    });

    $('#close-btn-search-apart').click(function () {
        $("#shadow-wrapper").hide();
        $("#shadow-wrapper-body").hide();
        $("#search-apart").hide();
    });


    $(".filter-li-text").on("click", function () {
        $(this).parent().find(".hidden-filter-element");

        if ($(this).parent().find(".hidden-filter-element").css('display') == 'none') {
            $(this).parent().find(".hidden-filter-element").animate({height: 'show'}, 500);
            $(this).find("span").css('color', '#626262');
            $(this).find(".toggle-filter-icon").addClass("opened-filter");
        }
        else {
            $(this).parent().find(".hidden-filter-element").animate({height: 'hide'}, 500);
            $(this).find("span").css('color', '#000');
            $(this).find(".toggle-filter-icon").removeClass("opened-filter");
        }
    });
});