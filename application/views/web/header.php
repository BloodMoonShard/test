<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="description" content="<?php if (sizeof($seodata) > 0) echo $seodata['description'] ?>">
    <meta name="keywords" content="<?php if (sizeof($seodata) > 0) echo $seodata['keywords'] ?>"/>
    <title>Avantelt <?php if (sizeof($seodata) > 0) echo '&mdash; ' . $seodata['title'] ?></title>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="/assets/w/css/reset.css">
    <link rel="stylesheet" href="/assets/w/css/barusel.css">
    <link rel="stylesheet" href="/assets/w/css/jquery.formstyler.css">
    <link rel="stylesheet" href="/assets/w/css/style.css">
    <link rel="stylesheet" href="/assets/w/css/jquery.nstSlider.css">
    <!--<link rel="stylesheet" href="css/print.css" media="print">-->

    <!-- jquery -->
    <script type="text/javascript" src="/assets/w/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/assets/w/js/design-js.js"></script>
    <script type="text/javascript" src="/assets/w/js/jquery.form.js"></script>

    <!--[if IE]>
    <link href="/assets/w/css/ie.css" rel="stylesheet" type="text/css"/>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<script>
    (function ($) {
        $(function () {

            $('.styled-select').styler();

        })
    })(jQuery)
</script>
<div class="shadow-wrapper" id="shadow-wrapper"></div>
<div class="shadow-wrapper-body" id="shadow-wrapper-body">
<div class="search-object" id="search-apart">
    <div class="close-btn" id="close-btn-search-apart"></div>
    <form action="/search_room" method="POST">
        <div class="inner-padding">
            <h3>Поиск объектов</h3>

            <p>
                <input type="radio" name="30" value="49" checked><span class="radio-text"> Я хочу купить </span>
                <input type="radio" name="30" value="48"><span class="radio-text">  Снять </span>
            </p>

            <div class="form-line first">
                <script type="text/javascript">
                    $(function(){
                        $('#search_room_id').on('change', function(){
                            var id_city = $(this).val();
                            $.ajax({
                                url: '/ajax/get_list_underground',
                                data: 'id_city='+id_city,
                                type: 'POST',
                                dataType: 'json',
                                success: function(response){
                                    $('#underground').html('<option value="">-</option>');
                                    if(response.content){
                                        for(var i = 0; i < response.content.length; i++){
                                            $('#underground').append('<option value="'+response.content[i].id_underground+'">'+response.content[i].name_underground+'</option>');
                                        }
                                    }
                                    $('#underground').trigger('refresh');
                                }
                            })
                        })
                    })

                </script>
                <label>Город:</label>
                <select class="styled-select" id="search_room_id" name="city">
                    <option value="">-</option>
                    <?= $list_city;?>
                </select>
            </div>
            <div class="form-line">
                <label>Метро:</label>
                <select class="styled-select" name="underground" id="underground">
                    <option value="">-</option>
                </select>
            </div>
            <div class="form-line">
                <label>Улица:</label>
                <input type="text" name="street" value="">
                <span class="spec-text"> дом </span>
                <input type="text" name="building" value="">
            </div>
            <div class="form-line">
                <label>Комнат</label>
                <select class="styled-select small" name="room">
                    <option value="">-</option>
                    <?= $list_room;?>
                </select>
            </div>

        </div>
        <div class="style-form-line">
            <div class="inner-padding">
                <span class="spec-text param2">Площадь квартиры, <Br/> кв м:</span>

                <p class="fix-padding">
                    От
                    <input type="text" name="area_min" value="">
                    До
                    <input type="text" name="area_max" value="">
                    <span class="spec-text param1">Цена: </span>
                    От
                    <input type="text" name="price_min" value="">
                    До
                    <input type="text" name="price_max" value="">
                    <input type="radio" name="valuta" checked> Руб
                    <input type="radio" name="valuta"> $
                    <input type="radio" name="valuta"> &euro;
                </p>

            </div>
        </div>
        <input type="submit" value="Найти объект">
    </form>
</div>

<div class="search-object" id="search-all">
    <div class="close-btn" id="close-btn-search-all"></div>
    <form action="/search" method="POST">
        <div class="inner-padding">
            <h3>Поиск объектов</h3>

            <p class="fix-margin-1">
                <input type="radio" name="30" value="49"><span class="radio-text"> Я хочу купить </span>
                <input type="radio" name="30" value="48"><span class="radio-text">  Снять </span>
            </p>

            <p class="fix-margin-1">
                <span class="spec-text"> Объект: </span>
                <input type="checkbox" name="type[]" value="1"><span class="radio-text"> Дом </span>
                <input type="checkbox" name="type[]" value="2"><span class="radio-text"> Участок </span>
<!--                <input type="checkbox" value="1"><span class="radio-text"> Квартира </span>-->
            </p>

            <p class="fix-margin-1">
                <span class="spec-text"> Шоссе / Направление </span>
            </p>
            <?php echo $highway;?>
            <ul class="directions clearfix">
                <?= $highway_direction;?>
                <li><a class="uncheck_highway" href="#">Убрать все</a></li>
            </ul>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('.directionAction').on('click', function(){
                        if($(this).attr('data-active') == 'true'){
                            $('.direction_'+$(this).attr('attr-id-direction')).prop('checked', false);;
                            $(this).attr('data-active', 'false');
                        }else{
                            console.log('.direction_'+$(this).attr('attr-id-direction'));
                            $('.direction_'+$(this).attr('attr-id-direction')).prop('checked', true);
                            $(this).attr('data-active', 'true');
                        }
                        return false;
                    })
                    $('.uncheck_highway').on('click', function(){
                        $('.directionAction').attr('data-active', 'false');
                        $('.checkbox-block input[type="checkbox"]').attr('checked', false);
                        return false;
                    })
                })
            </script>
        </div>
        <div class="style-form-line">
            <div class="inner-padding clearfix">
                <div class="left-side">
                    <span class="spec-text fix-padding-1">Удаленность, км от МКАД: </span>
                    От
                    <input name="28_min" type="text">
                    До
                    <input name="28_max" type="text">
                </div>
                <div class="right-side have-height">
                    <span class="spec-text fix-padding-1">Цена: </span>
                    От
                    <input name="29_min" type="text">
                    До
                    <input name="29_max" type="text">

                    <div class="valuta-block">
                        <input type="radio" value="51" name="32" checked> Руб
                        <input type="radio" value="52" name="32"> $
                        <input type="radio" value="53" name="32"> &euro;
                    </div>
                </div>

                <!--<span class="spec-text param2">Удаленность, км от МКАД:</span>-->
                <!--<p class="fix-padding">-->
                <!--От-->
                <!--<input type="text">-->
                <!--До-->
                <!--<input type="text">-->

                <!--<span class="spec-text param1">Цена: </span>-->
                <!--От-->
                <!--<input type="text">-->
                <!--До-->
                <!--<input type="text">-->
                <!--<input type="radio" name="valuta"> Руб-->
                <!--<input type="radio" name="valuta"> $-->
                <!--<input type="radio" name="valuta"> &euro;-->
                <!--</p>-->

            </div>
        </div>
        <div class="style-form-line">
            <div class="inner-padding clearfix">
                <div class="left-side">
                    <span class="spec-text fix-padding-1">Площадь дома, кв м: </span>
                    От
                    <input name="9_min" type="text">
                    До
                    <input name="9_max" type="text">
                </div>
                <div class="right-side">
                    <span class="spec-text fix-padding-1">Площадь участка, сотки: </span>
                    От
                    <input name="10_min" type="text">
                    До
                    <input name="10_max" type="text">
                </div>
            </div>
        </div>
        <input type="submit" value="Найти объект">
    </form>
</div>


<div class="search-object callback" id="callback">
    <div class="close-btn" id="close-callback"></div>
    <div class="inner-padding">
        <h3>Закажите обратный звонок</h3>

        <form method="POST" id="form_callback" action="javascript:void(null);" onsubmit="callback_send()">
            <div class="callback-form-line">
                <label>Ваше имя:</label>
                <input name="name" type="text">
            </div>
            <div class="callback-form-line">
                <label>Ваш телефон:</label>
                <input name="phone_number" type="text">
            </div>
            <input type="text" name="theme" hidden="hidden" value="С шапки сайта (обычный звонок)">
            <input type="submit" value="Отправить">
        </form>
        <div class="load-gif">
            <img src="/assets/w/design_img/loading-gif.GIF" alt="Подождите, отправка">
        </div>
        <div class="success-img"></div>
    </div>
</div>
<div class="search-object resume" id="resume">
    <div class="close-btn" id="close_resume"></div>
    <div class="inner-padding">
        <h3>Отправить резюме</h3>

        <form method="POST" id="form_resume" action="/admin/ajax/resume">
            <div class="callback-form-line">
                <label>Ваше имя:</label>
                <input name="name" type="text">
            </div>
            <div class="callback-form-line">
                <label>Ваш телефон:</label>
                <input name="phone_number" type="text">
            </div>
            <div class="callback-form-line">
                <label class="long-label">Прикрепить резюме:</label>
                <input name="file_resume" type="file">
            </div>
            <input type="submit" value="Отправить">
        </form>
        <div class="load-gif">
            <img src="/assets/w/design_img/loading-gif.GIF" alt="Подождите, отправка">
        </div>
        <div class="success-img"></div>
    </div>
</div>

</div>
<div class="wrapper">
    <header> <!-- header -->
        <div class="header-bg-teeth"></div>
        <div class="container">
            <div class="header-redline"></div>
            <div id="header-id">
                <a href="/">
                    <div class="logo">Avantelt</div>
                </a>

                <div class="right-side">
                    <div class="contacts-map-search">
                        <ul>
                            <li><img src="/assets/w/design_img/email.png"><a href="#" class="show_contacts">Контакты</a>
                            </li>
                            <div class="contacts-window" id="contacts-window">
                                <div class="close-contacts" id="close-contacts"></div>
                                <h3>Контакты</h3>

                                <div class="line-phone-number">8 (495) 540 43 03</div>
                                <div class="line-marker">Где мы находимся?</div>
                                <div class="line-contacts-text">
                                    <p>Московская область, <Br/>Химки, ул.Бабакина д.5А</p>
                                </div>
                                <div class="contacts-content">
                                    <!--                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1118.975482682097!2d37.42586365641076!3d55.88086518873922!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b53889ec645d2f%3A0x348e7b45c2e22fda!2z0YPQuy4g0JHQsNCx0LDQutC40L3QsCwgNSwg0KXQuNC80LrQuCwg0JzQvtGB0LrQvtCy0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsIDE0MTQwNw!5e0!3m2!1sru!2sru!4v1411540687144" width="320" height="225" frameborder="0" style="border:0"></iframe>-->
                                </div>
                            </div>
                            <li class="nulled-margin"><img src="/assets/w/design_img/map.png"><a href="#"
                                                                                                 class="show_map"">Карта</a>
                            </li>
                        </ul>
                        <form class="search" action="/welcome/search_header" method="POST">
                            <input type="submit">
                            <input type="text" name="search_query" id="search_query"
                                   placeholder="Введите артикул или населенный пункт">
                        </form>
                    </div>
                    <div class="order-call">
                        <p class="number">+7(495)777-07-99</p>
                        <a href="#" class="btn-order-call order_call">Заказать звонок</a>
                    </div>
                </div>
            </div>
            <div class="map-window" id="map-window">
                <div class="close-map" id="close-map"></div>
                <h3>Карта</h3>

                <div class="map-content">
                    <!--                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2237.954608814351!2d37.42603799999992!3d55.88080198849451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b53889ec645d2f%3A0x348e7b45c2e22fda!2z0YPQuy4g0JHQsNCx0LDQutC40L3QsCwgNSwg0KXQuNC80LrQuCwg0JzQvtGB0LrQvtCy0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsIDE0MTQwNw!5e0!3m2!1sru!2sru!4v1411530651080" width="525" height="395" frameborder="0" style="border:0"></iframe>-->
                </div>
            </div>
        </div>


    </header>
    <!-- *end* header -->
