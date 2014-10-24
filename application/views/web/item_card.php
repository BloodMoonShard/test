<div class="shadow-wrapper" id="shadow-wrapper-v2"></div>
<div class="shadow-wrapper-body" id="shadow-wrapper-body-v2">
    <div class="item-card-slider shadow-slider">
        <!-- -->
        <div id="barousel_thslide_window" class="barousel barousel-center-window">
            <div class="barousel_image">
                <a href="#" id="shadow-slider-close" class="shadow-slider-close" onclick="show_hide('#shadow-wrapper-body-v2'); show_hide('#shadow-wrapper-v2'); return false;">Close</a>
                <?php $img_count=0; foreach ($result['ob_images'] as $img) {
                    if ($img_count==0) {
                        echo '<a href="#"><img src="/upload_files/objects_img/'.$img['img_name'].'" alt="" class="default" /></a>';
                    } else {
                        echo '<a href="#"><img src="/upload_files/objects_img/'.$img['img_name'].'" alt=""/></a>';
                    }
                    $img_count++; } ?>
            </div>
            <div class="barousel_content">
                <div class="default">
                </div>
                <?php for ($i=0; $i<$img_count-1; $i++) {
                    echo '<div></div>';
                }?>
            </div>
            <div id="thslide_barousel_nav_window" class="thslide">
                <div class="thslide_nav_previous">
                    <a href="#">&nbsp;</a>
                </div>
                <div class="thslide_list">
                    <ul>
                        <?php $img_count=0; foreach ($result['ob_images'] as $img) {
                            echo '<li><a href="#"><img src="/upload_files/objects_img/'.$img['img_name'].'" alt=""/><span></span></a></li>';
                            $img_count++; } ?>
                    </ul>
                </div>
                <div class="thslide_nav_next">
                    <a href="#">&nbsp;</a>
                </div>
            </div>
        </div>
        <!-- -->
    </div>
</div>
<div class="wrapper">
<script type="text/javascript">
    $(document).ready(function () {
        $('#barousel_thslide').barousel({
            navWrapper: '#thslide_barousel_nav .thslide_list',
            manualCarousel: 1,
            navType: 3
        });

        $('#thslide_barousel_nav').thslide({
            itemOffset: 110
        });


        $('#barousel_thslide_window').barousel({
            navWrapper: '#thslide_barousel_nav_window .thslide_list',
            manualCarousel: 1,
            navType: 3
        });

        $('#thslide_barousel_nav_window').thslide({
            itemOffset: 214
        });
    });
</script>
<div class="grand-bg">
<div class="sub-navigation">
    <div class="container">
        <ul class="clearfix">
            <li class="current-page"><h1><?=$result['name_object'];?></h1></li>
            <li class="delimiter"></li>
            <li class="home-link"><img src="/assets/w/design_img/home.png" alt="Домой"><a href="/">Главная</a></li>
            <li class="search-link"><img src="/assets/w/design_img/search_black.png" alt="Поиск объектов"><a href="#" id="but-search-all">Поиск объектов</a></li>
        </ul>
    </div>
</div>
<div class="container">
    <ul class="breadcrumbs">
        <li><a href="/">Главная</a></li>
        <li> > </li>
        <li><a href="/type/<?=$result['uri_name'];?>"><?=$result['type_object'];?></a></li>
        <li> > </li>
        <li class="active-crumb"><?=$result['name_object'];?></li>
    </ul>
</div>
<section class="item-card">
<div class="container">
<div class="section-sheet-body">
<div class="section-sheet-body-inner">
<div class="spec-padding clearfix">
<div class="top-description clearfix">
    <div class="item-card-slider">
        <!-- -->
        <div class="increase" onclick="show_hide('#shadow-wrapper-body-v2'); show_hide('#shadow-wrapper-v2');  return false;"></div>
        <div id="barousel_thslide" class="barousel">
            <div class="barousel_image">
                <?php $img_count=0; foreach ($result['ob_images'] as $img) {
                    if ($img_count==0) {
                        echo '<a href="#"><img src="/upload_files/objects_img/'.$img['img_name'].'" alt="" class="default" /></a>';
                    } else {
                        echo '<a href="#"><img src="/upload_files/objects_img/'.$img['img_name'].'" alt=""/></a>';
                    }
                $img_count++; } ?>
            </div>
            <div class="barousel_content">
                <!-- content 1 -->
                <div class="default">
                </div>
                <?php for ($i=0; $i<$img_count-1; $i++) {
                    echo '<div></div>';
                }?>
            </div>


            <div id="thslide_barousel_nav" class="thslide">
                <div class="thslide_nav_previous">
                    <a href="#">&nbsp;</a>
                </div>
                <div class="thslide_list">
                    <ul>
                        <?php $img_count=0; foreach ($result['ob_images'] as $img) {
                            echo '<li><a href="#"><img src="/upload_files/objects_img/'.$img['img_name'].'" alt=""/><span></span></a></li>';
                            $img_count++; } ?>

                    </ul>
                </div>
                <div class="thslide_nav_next">
                    <a href="#">&nbsp;</a>
                </div>
            </div>
        </div>
        <!-- -->

    </div>
    <div class="general-info clearfix">
        <p><span class="item-card-general-head"><?=$result['name_object'];?></span></p>
        <div class="info-block">
            <p><span class="secondary-head">Общая информация:</span></p>
            <table>
                <tbody>
                <?php if(strlen($result['highway_name']) > 0){?>
                <tr class="colored">
                    <td class="cat-name">Шоссе:</td>
                    <td class="description"><?=$result['highway_name'];?></td>
                </tr>
                <?php }?>
                <tr>
                    <td class="cat-name">Удаленность:</td>
                    <td class="description"><?=$result['28'];?></td>
                </tr>
                <tr class="colored">
                    <td class="cat-name">Населенный пункт:</td>
                    <td class="description"><?=$result['city'];?></td>
                </tr>
                <?php if ($result['type']!=2) {?>
                <tr>
                    <td class="cat-name">Площадь дома:</td>
                    <td class="description"><?=(int)$result['9'];?> кв.м.</td>
                </tr>
                <?php } ?>
                <tr class="colored">
                    <td class="cat-name">Площадь участка:</td>
                    <td class="description"><?=(int)$result['10'];?> сот.</td>
                </tr>
                <?php if(strlen($result['article']) > 0){?>
                <tr>
                    <td class="cat-name">Артикул:</td>
                    <td class="description"><?=$result['article'];?></td>
                </tr>
                <?php } ?>
                <?php if ($result['type']!=2) {?>
                <tr class="colored">
                    <td class="cat-name">Тип застройки:</td>
                    <td class="description"><?=$result['11'];?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <div class="price_place">
                <p>Цена: <?=$result['29'];?> <del><span style="font-family: Arial;">P</span></del></p>
                <?php $session_comparison = $this->session->userdata('comparison');?>


<!--                <p class="compare-check"><input type="checkbox" name="compare" id="compare"> <span>Сравнить</span></p>-->
                <div class="compare-check">
                    <?php
                        $in_comparison=false;
                        $size_comp = sizeof($session_comparison);
                        foreach ($session_comparison as $s) {
                        if ($s == $result['id_objects']) {
                            $in_comparison = true;
                            break;
                        }
                    } ?>
                    <div class="in-comp">
                        <input name="to-list" class="to-list"
                               id="to-list-<?php echo $result['id_objects'] ?>"
                               type="checkbox"
                               value="<?php echo $result['id_objects']; ?>"
                            <?php if($in_comparison) echo 'checked' ?>>
                        <?php $style1=""; $style = ""; if($in_comparison) {
                            $style = "display: inline-block";
                        } else {$style1 = "display: inline-block";} ?>

                        <label style="<?php echo $style1; ?>"
                               for="to-list-<?php echo $result['id_objects'] ?>"
                               id="label-<?php echo $result['id_objects'] ?>" >
                            <?php if($in_comparison) {echo 'Список сравнения <span style="color: #EE4942;">(' . $size_comp . ')</span>'; }else { echo 'Сравнить';} ?>
                        </label>

                        <a style="<?php echo $style; ?>" href="/comparison" class="link_comp" id="not_label-<?php echo $result['id_objects'] ?>">
                            <?php if($in_comparison) {echo 'Список сравнения <span style="color: #EE4942;">(' . $size_comp . ')</span>'; }else { echo 'Сравнить';} ?>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="second-description">
    <p><span class="secondary-head">Общая информация:</span></p>
    <p>
        <?=$result['31']; ?>
    </p>

    <?=$content;?>
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            initialize();
        })
        var geocoder;

        function initialize() {
            var styles = [
                {
                    featureType: "poi",
                    elementType: "labels",
                    stylers: [
                        { visibility: "off" }
                    ]
                }
            ];

            var styledmap = new google.maps.StyledMapType(styles, {name: "Styled Map"});

            geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'address': '<?php echo $result['region']." область, ".$result['city']." ".$result['street']." ".$result['building'];?>'}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    for(var locate in results[0].geometry.location){
                        if(isFinite(results[0].geometry.location[locate])){
                            if(locate == 'k'){
                                var x = results[0].geometry.location[locate];
                            }else{
                                var y = results[0].geometry.location[locate];
                            }
                        }
                    }

                    var canvas = document.getElementById('current-location-map');


                    var coords = new google.maps.LatLng(x, y);
                    var options = {
                        mapTypeControl: false,
                        panControl: false,
                        scaleControl: false,
                        zoomControl: false,
                        zoomControlOptions: {
                            position: google.maps.ControlPosition.LEFT_TOP,
                            style: google.maps.ZoomControlStyle.SMALL
                        },
                        streetViewControl: false,
                        center: coords,
                        zoom: 16,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        mapTypeControlOptions: {
                            mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'styled-map']
                        },
                        styles: styles
                    }

                    var map = new google.maps.Map(canvas, options);

                    var marker = new google.maps.Marker({
                        position: coords,
                        map: map,
                        icon: '/assets/w/design_img/marker-ico.png'
                    });

                    map.mapTypes.set('styled-map', styledmap);
                    map.setMapTypeId('styled-map');
                    var center = map.getCenter();
                    google.maps.event.trigger(map, "resize");
                    map.setCenter(center);
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
        // end: Google Map
    </script>
<div class="item-location">
    <p>
        <span class="btn-map-img">Карта</span>
    </p>
    <div id="current-location-map" style="width: 926px; height: 395px;">
<!--        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d71845.72347782149!2d37.63815977509428!3d55.75539511575265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1411720957717" width="790" height="395" frameborder="0" style="border:0"></iframe>-->
    </div>
</div>
<div class="other-items clearfix">
    <p><span class="item-card-general-head">Другие объекты в этом районе</span></p>
    <?php if($near_object){
        foreach($near_object as $v){?>
            <div class="other-items-element">
                <img src="../../../assets/w/design_img/123.jpg" alt="">
                <a href="/details/<?=$v['id_objects']?>"><?=$v['type_object'];?>, <?=$v['district'];?> <?=$v['city'];?> <?=$v['highway_name'];?>.<?=$v['9'];?>м2, <?=$v['10'];?> соток</a>
                <p class="price"><?=$v['29'];?> <del><span style="font-family: Arial;">P</span></del></p>
            </div>
        <?}
}?>
</div>
</div>
</div>
</div>
</div>
</section>
</div>