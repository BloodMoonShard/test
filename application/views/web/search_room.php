<script>
    $(document).ready(function () {

        $('.nstSlider').nstSlider({

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


<div class="grand-bg">
<div class="sub-navigation">
    <div class="container">
        <ul class="clearfix">
            <li class="current-page">Найдено объектов: <?= $counts; ?></li>
            <li class="delimiter"></li>
            <li class="home-link"><img src="/assets/w/design_img/home.png" alt="Домой"><a href="/">Главная</a></li>
            <li class="search-link" id="but-search-apart"><img src="/assets/w/design_img/search_black.png" alt="Поиск объектов"><a href="#">Поиск
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
                url: '/ajax/filter/search_room',
                data: $(this).attr('class').split(' ')[1]+'='+$(this).val(),
                type: 'post',
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    $('.catalog-objects').html(response.content);
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
        <?php         $data_filter = @unserialize($this->session->userdata('search_room')); if(!$data_filter){$data_filter = array();}?>
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
            <div class="filter-li-text"><span>Метро</span>

                <div class="toggle-filter-icon"></div>
            </div>
            <div class="list-town hidden-filter-element">
                <?php foreach($filter['underground'] as $k=>$c){
                    $checked = "";
                    if(isset($data_filter['underground'][$k])){ $checked="checked=checked";}?>
                    <div class="element">
                        <input type="checkbox" <?=$checked;?> class="filter underground" value="<?=$k;?>" name="underground"> <?=$filter['underground_name'][$k];?> (<?=$c?>)
                    </div>
                <?php }?>
            </div>
        </li>
        <li>
            <div class="filter-li-text"><span>Площадь</span>

                <div class="toggle-filter-icon"></div>
            </div>
            <div class="hidden-filter-element">
                <div class="leftLabel"><span></span></div>
                <span>-</span>

                <div class="rightLabel"><span></span></div>
                <input type="hidden" class="filter home_min" name="min_value"/>
                <input type="hidden" class="filter home_max" name="max_value"/>
                <div class="nstSlider" data-range_min="<?=(int)$filter['min_home'];?>" data-range_max="<?=(int)$filter['max_home'];?>"
                     data-cur_min="<?php if(isset($data_filter['home_min'])){echo $data_filter['home_min'];}else{echo (int)$filter['min_home'];}?>"
                     data-cur_max="<?php if(isset($data_filter['home_max'])){echo $data_filter['home_max'];}else{echo (int)$filter['max_home'];}?>">
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
                     data-cur_min="<?php if(isset($data_filter['price_min'])){echo $data_filter['price_min'];}else{echo (int)$filter['min_price'];}?>"
                     data-cur_max="<?php if(isset($data_filter['price_max'])){echo $data_filter['price_max'];}else{echo (int)$filter['max_price'];}?>">
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
                <li><a href="#">Поиск</a></li>

            </ul>
            <div class="catalog-content-headline">
                <h1>Результаты поиска</h1>
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
                    <img src="/upload_files/objects_img/<?php echo @$v['ob_images'][0]['img_name'] ?>" alt="">

                    <div class="specifications">

                        <div class="spec-line">
                            <div class="spec-label">Регион:</div>
                            <div class="spec-text underline"><?php if($v['region'] != ''){echo $v['region'].' область, ';} ?><?php if($v['city'] != ''){echo $v['city'];} ?></div>
                        </div>
                        <div class="spec-line">
                            <div class="spec-label">Метро:</div>
                            <div class="spec-text"><?= $v['name_underground']; ?></div>
                        </div>
                        <div class="spec-line">
                            <div class="spec-label">Адрес:</div>
                            <div class="spec-text">ул.<?= $v['street']; ?>, <?= $v['building']; ?></div>
                        </div>
                        <div class="spec-line">
                            <div class="spec-label">Площадь:</div>
                            <div class="spec-text"><?= $v['9']; ?> кв.м.</div>
                        </div>
                        <?php if($v['33'] != ''){?>
                        <div class="spec-line">
                            <div class="spec-label">Количество комнат:</div>
                            <div class="spec-text"><?= $v['33']; ?></div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="description">
                                    <span class="price">Цена: <?= $v['29']; ?>
                                        <del><span style="font-family: Arial;">P</span></del></span>

                        <p>
                            <?php
                            if (strlen($v['31'])>80) {
                                echo mb_substr(strip_tags($v['31']), 0, 80) . ' ...';
                            } else {
                                echo mb_substr(strip_tags($v['31']), 0, 80);
                            }

                            ?>
                        </p>

                        <?php echo comparison_links($v['id_objects']); ?>

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
