function callback_send() {
    var msg = $('#form_callback').serialize();
    $.ajax({
        type: 'POST',
        url: '/admin/ajax/callback',
        data: msg,
        success: function() {
            $('#form_callback').hide();
            $('.load-gif').delay(200).fadeIn(300).delay(1500).fadeOut(400);
            $('.success-img').delay(2600).fadeIn(300);

        },
        error:  function(){
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
        success: function() {
            $('.success-img-v2').delay(600).fadeIn(500);

        },
        error:  function(){
            alert('Возникла ошибка');
        }
    });
}

function show_hide (blockId)
{
    if ($(blockId).css('display') == 'none')
    {
        $(blockId).animate({height: 'show'}, 500);
    }
    else
    {
        $(blockId).animate({height: 'hide'}, 500);
    }
}

function show_hide_filter (blockId)
{
    if ($(blockId).css('display') == 'none')
    {
        $(blockId).animate({height: 'show'}, 500);
        console.log($(this));

        $(this).find("span").css('color', '#626262');
        $(this).find(".toggle-filter-icon").addClass("opened-filter");
    }
    else
    {
        $(blockId).animate({height: 'hide'}, 500);
        $(this).find("span").css('color', '#000');
        $(this).find(".toggle-filter-icon").removeClass("opened-filter");
    }
}

$(document).ready(function() {

    $('.show_map').click(function() {
                $("#map-window").css('visibility', 'visible');
    });
    $('#close-map').click(function() {
            $("#map-window").css('visibility', 'hidden');
    });

    $('.show_contacts').click(function() {
        $("#contacts-window").css('visibility', 'visible');
    });
    $('#close-contacts').click(function() {
        $("#contacts-window").css('visibility', 'hidden');
    });

    $('.order_call').click(function() {
        $("#shadow-wrapper").show();
        $("#shadow-wrapper-body").show();
        $("#callback").show();
    });

    $('#close-callback').click(function() {
        $("#shadow-wrapper").hide();
        $("#shadow-wrapper-body").hide();
        $("#callback").hide();
    });

    $('#btn_send_resume').click(function() {
        $("#shadow-wrapper").show();
        $("#shadow-wrapper-body").show();
        $("#resume").show();
    });

    $('#close_resume').click(function() {
        $("#shadow-wrapper").hide();
        $("#shadow-wrapper-body").hide();
        $("#resume").hide();
    });

    $(".filter-li-text").on("click", function () {
        $(this).parent().find(".hidden-filter-element");

        if ($(this).parent().find(".hidden-filter-element").css('display') == 'none')
        {
            $(this).parent().find(".hidden-filter-element").animate({height: 'show'}, 500);
            console.log($(this));

            $(this).find("span").css('color', '#626262');
            $(this).find(".toggle-filter-icon").addClass("opened-filter");
        }
        else
        {
            $(this).parent().find(".hidden-filter-element").animate({height: 'hide'}, 500);
            $(this).find("span").css('color', '#000');
            $(this).find(".toggle-filter-icon").removeClass("opened-filter");
        }
    });
});