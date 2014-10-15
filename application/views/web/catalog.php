<script>


    $(document).ready(function () {

        $('.nstSlider').nstSlider({
            "rounding": {
                "100": "1000",
                "1000": "5000"
            },
            "left_grip_selector": ".leftGrip",
            "right_grip_selector": ".rightGrip",
            "value_bar_selector": ".bar",
            "value_changed_callback": function (cause, leftValue, rightValue) {
                var $container = $(this).parent();
                if(leftValue != $container.find('input[name=min_value]').val()){
                    $container.find('input[name=min_value]').val(leftValue);
                    $('.filter.'+$container.find('input[name=min_value]').attr('class').split(' ')[1]).trigger('change');
                }

                if(rightValue != $container.find('input[name=max_value]').val()){
                    $container.find('input[name=max_value]').val(rightValue);
                    $('.filter.'+$container.find('input[name=max_value]').attr('class').split(' ')[1]).trigger('change');
                }
                $container.find('.leftLabel span').text(leftValue);
                $container.find('.rightLabel span').text(rightValue);
            }
        });
    });
</script>

<!--<div class="shadow-wrapper show-me" id="shadow-wrapper"></div>-->
<!--<div class="shadow-wrapper-body show-me" id="shadow-wrapper-body">-->
<!-- -->
<!--<div class="search-object" id="search-apart">-->
<!--<div class="close-btn"></div>-->
<!--<form action="" method="POST">-->
<!--<div class="inner-padding">-->
<!--<h3>Поиск объектов</h3>-->
<!--<p>-->
<!--<input type="radio" name="buy_rent" value="buy"><span class="radio-text"> Я хочу купить </span>-->
<!--<input type="radio" name="buy_rent" value="rent"><span class="radio-text">  Снять </span>-->
<!--</p>-->
<!--<div class="form-line first">-->
<!--<label>Регион:</label>-->
<!--<select class="styled-select">-->
<!--<option>Москва</option>-->
<!--<option>Москва Москва Москва Москва</option>-->
<!--</select>-->
<!--</div>-->
<!--<div class="form-line">-->
<!--<label>Метро:</label>-->
<!--<select class="styled-select">-->
<!--<option>-</option>-->
<!--</select>-->
<!--</div>-->
<!--<div class="form-line">-->
<!--<label>Улица:</label>-->
<!--<input type="text">-->
<!--<span class="spec-text"> дом </span>-->
<!--<input type="text">-->
<!--</div>-->
<!--<div class="form-line">-->
<!--<label>Комнат</label>-->
<!--<select class="styled-select small">-->
<!--<option>-</option>-->
<!--</select>-->
<!--</div>-->

<!--</div>-->
<!--<div class="style-form-line">-->
<!--<div class="inner-padding">-->
<!--<span class="spec-text param2">Площадь квартиры, <Br/> кв м:</span>-->
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
<!--<input type="radio" name="valuta" checked> Руб-->
<!--<input type="radio" name="valuta"> $-->
<!--<input type="radio" name="valuta"> &euro;-->
<!--</p>-->

<!--</div>-->
<!--</div>-->
<!--<input type="submit" value="Найти объект">-->
<!--</form>-->
<!--</div>-->
<!-- -->

<!-- -->
<!--<div class="search-object" id="search-all">-->
<!--<div class="close-btn"></div>-->
<!--<form action="" method="POST">-->
<!--<div class="inner-padding">-->
<!--<h3>Поиск объектов</h3>-->
<!--<p class="fix-margin-1">-->
<!--<input type="radio" name="buy_rent" value="buy"><span class="radio-text"> Я хочу купить </span>-->
<!--<input type="radio" name="buy_rent" value="rent"><span class="radio-text">  Снять </span>-->
<!--</p>-->
<!--<p class="fix-margin-1">-->
<!--<span class="spec-text"> Объект: </span>-->
<!--<input type="checkbox" value="1"><span class="radio-text"> Дом </span>-->
<!--<input type="checkbox" value="1"><span class="radio-text"> Участок </span>-->
<!--<input type="checkbox" value="1"><span class="radio-text"> Квартира </span>-->
<!--</p>-->
<!--<p class="fix-margin-1">-->
<!--<span class="spec-text"> Шоссе / Направление </span>-->
<!--</p>-->
<!--<div class="checkbox-block">-->
<!--<p><input type="checkbox">Любое</p>-->
<!--<p><input type="checkbox">Боровское</p>-->
<!--<p><input type="checkbox">Киевское</p>-->
<!--<p><input type="checkbox">Калужское</p>-->
<!--<p><input type="checkbox">Можайское</p>-->
<!--<p><input type="checkbox">Минское</p>-->
<!--<p><input type="checkbox">Рублево-Успенское</p>-->
<!--<p><input type="checkbox">Сколковское</p>-->
<!--<p><input type="checkbox">Ильинское</p>-->
<!--</div>-->
<!--<div class="checkbox-block">-->
<!--<p><input type="checkbox">Любое</p>-->
<!--<p><input type="checkbox">Боровское</p>-->
<!--<p><input type="checkbox">Киевское</p>-->
<!--<p><input type="checkbox">Калужское</p>-->
<!--<p><input type="checkbox">Можайское</p>-->
<!--<p><input type="checkbox">Минское</p>-->
<!--<p><input type="checkbox">Рублево-Успенское</p>-->
<!--<p><input type="checkbox">Сколковское</p>-->
<!--<p><input type="checkbox">Ильинское</p>-->
<!--</div>-->
<!--<div class="checkbox-block">-->
<!--<p><input type="checkbox">Любое</p>-->
<!--<p><input type="checkbox">Боровское</p>-->
<!--<p><input type="checkbox">Киевское</p>-->
<!--<p><input type="checkbox">Калужское</p>-->
<!--<p><input type="checkbox">Можайское</p>-->
<!--<p><input type="checkbox">Минское</p>-->
<!--<p><input type="checkbox">Рублево-Успенское</p>-->
<!--<p><input type="checkbox">Сколковское</p>-->
<!--<p><input type="checkbox">Ильинское</p>-->
<!--</div>-->
<!--<div class="checkbox-block">-->
<!--<p><input type="checkbox">Любое</p>-->
<!--<p><input type="checkbox">Боровское</p>-->
<!--<p><input type="checkbox">Киевское</p>-->
<!--<p><input type="checkbox">Калужское</p>-->
<!--<p><input type="checkbox">Можайское</p>-->
<!--<p><input type="checkbox">Минское</p>-->
<!--<p><input type="checkbox">Рублево-Успенское</p>-->
<!--<p><input type="checkbox">Сколковское</p>-->
<!--<p><input type="checkbox">Ильинское</p>-->
<!--</div>-->
<!--<ul class="directions clearfix">-->
<!--<li><a href="#">Юго-Запад</a></li>-->
<!--<li><a href="#">Запад</a></li>-->
<!--<li><a href="#">Северо-Запад</a></li>-->
<!--<li><a href="#">Север</a></li>-->
<!--<li><a href="#">Восток</a></li>-->
<!--<li><a href="#">Юго-Восток</a></li>-->
<!--<li><a href="#">Москва</a></li>-->
<!--<li><a href="#">Убрать все</a></li>-->
<!--</ul>-->
<!--</div>-->
<!--<div class="style-form-line">-->
<!--<div class="inner-padding clearfix">-->
<!--<div class="left-side">-->
<!--<span class="spec-text fix-padding-1">Удаленность, км от МКАД: </span>-->
<!--От-->
<!--<input type="text">-->
<!--До-->
<!--<input type="text">-->
<!--</div>-->
<!--<div class="right-side have-height">-->
<!--<span class="spec-text fix-padding-1">Цена: </span>-->
<!--От-->
<!--<input type="text">-->
<!--До-->
<!--<input type="text">-->
<!--<div class="valuta-block">-->
<!--<input type="radio" name="valuta" checked> Руб-->
<!--<input type="radio" name="valuta"> $-->
<!--<input type="radio" name="valuta"> &euro;-->
<!--</div>-->
<!--</div>-->

<!--&lt;!&ndash;<span class="spec-text param2">Удаленность, км от МКАД:</span>&ndash;&gt;-->
<!--&lt;!&ndash;<p class="fix-padding">&ndash;&gt;-->
<!--&lt;!&ndash;От&ndash;&gt;-->
<!--&lt;!&ndash;<input type="text">&ndash;&gt;-->
<!--&lt;!&ndash;До&ndash;&gt;-->
<!--&lt;!&ndash;<input type="text">&ndash;&gt;-->

<!--&lt;!&ndash;<span class="spec-text param1">Цена: </span>&ndash;&gt;-->
<!--&lt;!&ndash;От&ndash;&gt;-->
<!--&lt;!&ndash;<input type="text">&ndash;&gt;-->
<!--&lt;!&ndash;До&ndash;&gt;-->
<!--&lt;!&ndash;<input type="text">&ndash;&gt;-->
<!--&lt;!&ndash;<input type="radio" name="valuta"> Руб&ndash;&gt;-->
<!--&lt;!&ndash;<input type="radio" name="valuta"> $&ndash;&gt;-->
<!--&lt;!&ndash;<input type="radio" name="valuta"> &euro;&ndash;&gt;-->
<!--&lt;!&ndash;</p>&ndash;&gt;-->

<!--</div>-->
<!--</div>-->
<!--<div class="style-form-line">-->
<!--<div class="inner-padding clearfix">-->
<!--<div class="left-side">-->
<!--<span class="spec-text fix-padding-1">Площадь дома, кв м: </span>-->
<!--От-->
<!--<input type="text">-->
<!--До-->
<!--<input type="text">-->
<!--</div>-->
<!--<div class="right-side">-->
<!--<span class="spec-text fix-padding-1">Площадь участка, сотки: </span>-->
<!--От-->
<!--<input type="text">-->
<!--До-->
<!--<input type="text">-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<input type="submit" value="Найти объект">-->
<!--</form>-->
<!--</div>-->

<!-- -->
<!--<div class="search-object callback" id="callback">-->
<!--<div class="close-btn"></div>-->
<!--<div class="inner-padding">-->
<!--<h3>Закажите обратный звонок</h3>-->
<!--<form action="" method="POST">-->
<!--<div class="callback-form-line">-->
<!--<label>Ваше имя:</label>-->
<!--<input type="text">-->
<!--</div>-->
<!--<div class="callback-form-line">-->
<!--<label>Ваш телефон:</label>-->
<!--<input type="text">-->
<!--</div>-->
<!--<input type="submit" value="Отправить">-->
<!--</form>-->

<!--</div>-->
<!--</div>-->
<!--</div>-->


<div class="grand-bg">
<div class="sub-navigation">
    <div class="container">
        <ul class="clearfix">
            <li class="current-page">Найдено объектов: <?= $counts; ?></li>
            <li class="delimiter"></li>
            <li class="home-link"><img src="/assets/w/design_img/home.png" alt="Домой"><a href="#">Главная</a></li>
            <li class="search-link" id="but-search-all"><img src="/assets/w/design_img/search_black.png" alt="Поиск объектов"><a href="#">Поиск
                    объектов</a></li>
            <li class="count-on-page">
                <?php echo $get_per_page; ?>
            </li>
        </ul>
    </div>
</div>
<section class="catalog">
<div class="container clearfix">
<script type="text/javascript">
    $(document).ready(function(){
        $('.filter').on('change', function(){
            $.ajax({
                url: '/ajax/filter/house',
                data: $(this).attr('class').split(' ')[1]+'='+$(this).val(),
                type: 'post',
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    $('.catalog-objects').html(response.content);
                }
            })
        })
        $('.choose-type a').click(function(){
            $.ajax({
                url: '/ajax/change_type',
                type: 'POST',
                data: 'link='+window.location.href,
                dataType: 'json',
                success: function(response){
                    if(response.status){
                        console.log(response.link);
                        window.location.href = response.link;
                    }
                }
            })
        })
    })
</script>
<div class="sidebar-filter">
    <div class="headline-filter">
        Фильтр
        <a href="#">Очистить</a>
    </div>
    <ul>
        <?php         $data_filter = @unserialize($this->session->userdata('house')); if(!$data_filter){$data_filter = array();}?>
        <li id="filter_district">
            <div class="filter-li-text"><span>Район</span>

                <div class="toggle-filter-icon"></div>
            </div>
            <div class="list-town hidden-filter-element">
                <?php foreach($filter['district'] as $k=>$c){
                    $checked = "";
                    if(isset($data_filter['district'][$k])){ $checked="checked=checked";}?>
                    <div class="element">
                        <input type="checkbox" <?= $checked;?> class="filter district" value="<?=$k;?>"> <?=$k;?> (<?=$c?>)
                    </div>
                <?php }?>
            </div>
        </li>
        <li>
            <div class="filter-li-text"><span>Населенный пункт</span>

                <div class="toggle-filter-icon"></div>
            </div>
            <div class="list-town hidden-filter-element">
                <?php foreach($filter['city'] as $k=>$c){
                    $checked = "";
                    if(isset($data_filter['city'][$k])){ $checked="checked=checked";}?>
                    <div class="element">
                        <input type="checkbox" <?=$checked;?> class="filter city" value="<?=$k;?>" name="city"> <?=$k;?> (<?=$c?>)
                    </div>
                <?php }?>
            </div>
        </li>
        <li>
            <div class="filter-li-text"><span>Площадь участка</span>

                <div class="toggle-filter-icon"></div>
            </div>
            <div class="hidden-filter-element">
                <div class="leftLabel"><span></span></div>
                <span>-</span>

                <div class="rightLabel"><span></span></div>
                <input type="hidden" class="filter area_min" name="min_value"/>
                <input type="hidden" class="filter area_max" name="max_value"/>
                <div class="nstSlider" data-range_min="<?=(int)$filter['min_area'];?>" data-range_max="<?=(int)$filter['max_area'];?>"
                     data-cur_min="<?php if(isset($data_filter['area_min'])){echo $data_filter['area_min'];}else{echo (int)$filter['min_area'];};?>"
                     data-cur_max="<?php if(isset($data_filter['area_max'])){echo $data_filter['area_max'];}else{echo (int)$filter['max_area'];};?>">
                    <div class="bar"></div>
                    <div class="leftGrip"></div>
                    <div class="rightGrip"></div>
                </div>
                <span class="currency">кв.м.</span>
            </div>
        </li>
        <li>
            <div class="filter-li-text"><span>Площадь дома</span>

                <div class="toggle-filter-icon"></div>
            </div>
            <div class="hidden-filter-element">
                <div class="leftLabel"><span></span></div>
                <span>-</span>

                <div class="rightLabel"><span></span></div>
                <input type="hidden" class="filter home_min" name="min_value"/>
                <input type="hidden" class="filter home_max" name="max_value"/>
                <div class="nstSlider" data-range_min="<?=(int)$filter['min_home'];?>" data-range_max="<?=(int)$filter['max_home'];?>"
                     data-cur_min="<?php if(isset($data_filter['home_min'])){echo $data_filter['home_min'];}else{echo (int)$filter['min_home'];};?>"
                     data-cur_max="<?php if(isset($data_filter['home_max'])){echo $data_filter['home_max'];}else{echo (int)$filter['max_home'];};?>">
                    <div class="bar"></div>
                    <div class="leftGrip"></div>
                    <div class="rightGrip"></div>
                </div>
                <span class="currency">кв.м.</span>
            </div>
        </li>
        <li>
            <div class="filter-li-text"><span>Фильтр по цене</span>

                <div class="toggle-filter-icon"></div>
            </div>
            <div class="hidden-filter-element">
                <div class="leftLabel"><span></span></div>
                <span>-</span>

                <div class="rightLabel"><span></span></div>
                <input type="hidden" class="filter price_min" name="min_value"/>
                <input type="hidden" class="filter price_max" name="max_value"/>
                <div class="nstSlider" data-range_min="<?=(int)$filter['min_price'];?>" data-range_max="<?=(int)$filter['max_price'];?>"
                     data-cur_min="<?php if(isset($data_filter['price_min'])){echo $data_filter['price_min'];}else{echo (int)$filter['min_price'];};?>"
                     data-cur_max="<?php if(isset($data_filter['price_max'])){echo $data_filter['price_max'];}else{echo (int)$filter['max_price'];};?>">
                    <div class="bar"></div>
                    <div class="leftGrip"></div>
                    <div class="rightGrip"></div>
                </div>
                <span class="currency">руб.</span>
            </div>
        </li>
    </ul>
</div>
<div class="catalog-content">
    <div class="sub-head clearfix">
        <div class="left-side">
            <ul class="breadcrumbs">
                <li><a href="#">Главная</a></li>
                <li> ></li>
                <li><a href="#">Квартиры</a></li>
                <li> ></li>
                <li class="active-crumb">Коттеджи, дома</li>
            </ul>
            <div class="catalog-content-headline">
                <h1>Коттеджи, дома</h1>
            </div>
            <div class="choose-type">
                <a class="btn <?php if ($this->session->userdata('sort') == 49) {
                    echo 'active';
                } ?>">
                    <div class="active-arrow"></div>
                    ПРОДАЖА</a>
                <a class="btn <?php if ($this->session->userdata('sort') == 48) {
                    echo 'active';
                } ?>">
                    <div class="active-arrow"></div>
                    АРЕНДА</a>
            </div>
        </div>
        <div class="right-side">
            <div class="block-services">
                <div class="img-service cottage-house"></div>
            </div>
        </div>
    </div>
    <div class="catalog-objects">
        <?php foreach ($objects as $v) {?>
            <div class="one-object">
                <div class="title">
                    <h2><?= $v['name_object'] ?></h2>
                </div>
                <div class="content clearfix">
                    <img src="/upload_files/objects_img/<?php echo $v['ob_images'][0]['img_name'] ?>" alt="">

                    <div class="specifications">
                        <div class="spec-line">
                            <div class="spec-label">Удаленность:</div>
                            <div class="spec-text"><?= $v[28]; ?> км от МКАД</div>
                        </div>
                        <div class="spec-line">
                            <div class="spec-label">Населенный пункт:</div>
                            <div class="spec-text underline"><?= $v['city']; ?></div>
                        </div>
                        <div class="spec-line">
                            <div class="spec-label">Район:</div>
                            <div class="spec-text"><?= $v['district']; ?> район</div>
                        </div>
                        <div class="spec-line">
                            <div class="spec-label">Площадь:</div>
                            <div class="spec-text"><?= $v['9']; ?> кв.м.</div>
                        </div>
                        <div class="spec-line">
                            <div class="spec-label">Площадь участка:</div>
                            <div class="spec-text"><?= $v['10']; ?> сот.</div>
                        </div>
                    </div>
                    <div class="description">
                                    <span class="price">Цена: <?= $v['29']; ?>
                                        <del><span style="font-family: Arial;">P</span></del></span>

                        <p><?= $v['31']; ?></p>

                        <div class="more-info">
                            <a href="/details/<?= $v['id_objects'] ?>">Подробнее</a>

                            <form action="" method="post">
                                <input name="to-list" id="to-list" type="checkbox" value="1"><label
                                    for="to-list">Сравнить</label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="bottom-block clearfix">
            <?= $links; ?>


            <div class="count-on-page">
                <?php echo $get_per_page; ?>
            </div>
        </div>


    </div>
</div>

</div>
</section>

</div>
