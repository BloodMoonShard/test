<script type="text/javascript">
    $(document).ready(function () {
        $('#barousel_thslide').barousel({
            navWrapper: '#thslide_barousel_nav .thslide_list',
            manualCarousel: 1,
            navType: 3
        });

        $('#thslide_barousel_nav').thslide({
            itemOffset: 113
        });
    });
</script>
    <div class="grand-bg">
        <div class="sub-navigation">
            <div class="container">
                <ul class="clearfix">
                    <li class="current-page">Строительство</li>
                    <li class="delimiter"></li>
                    <li class="home-link"><img src="/assets/w/design_img/home.png" alt="Домой"><a href="/">Главная</a></li>
                    <li class="search-link"><img src="/assets/w/design_img/search_black.png" alt="Поиск объектов"><a href="#">Поиск объектов</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="#">Главная</a></li>
                <li> > </li>
                <li><a href="/type/building">Строительство</a></li>
                <li> > </li>
                <li class="active-crumb"><?php echo $data['title']; ?></li>
            </ul>
        </div>
        <section class="building-advanced">
                <div class="container clearfix">
                    <div class="section-sheet-body">
                        <div class="section-sheet-body-inner clearfix">
                            <div id="barousel_thslide" class="barousel building-advanced">
                                <div class="barousel_image">
                                    <?php $counter = 0; foreach ($data['images'] as $im) {?>
                                    <a href="#"><img src="/upload_files/building_img/<?php echo $im['img_name']; ?>" alt="" <?php if ($counter==0) echo 'class="default"'; ?> /></a>
                                    <?php $counter++; } ?>
                                </div>
                                <div class="barousel_content">
                                    <?php
                                        for($i=0; $i<$counter; $i++) {
                                            if ($i==0) {
                                                echo '<div class="default"></div>';
                                            } else {
                                                echo '<div></div>';
                                            }
                                        }
                                    ?>
                                </div>
                                <div id="thslide_barousel_nav" class="thslide">
                                    <div class="thslide_nav_previous">
                                        <a href="#">&nbsp;</a>
                                    </div>
                                    <div class="thslide_list">
                                        <ul>
                                            <?php $counter = 0; foreach ($data['images'] as $im) {?>
                                                <li><a href="#"><img src="/upload_files/building_img/<?php echo $im['img_name']; ?>" alt="" /><span></span></a></li>
                                            <?php $counter++; } ?>
                                        </ul>
                                    </div>
                                    <div class="thslide_nav_next">
                                        <a href="#">&nbsp;</a>
                                    </div>
                                </div>
                            </div>

                            <div class="right-description">
                                <div class="content">
                                    <h1 class="title"><?php echo $data['title']; ?></h1>
                                    <p>
                                        <?php
                                            $data['description'] = str_replace("\r\n", "<Br/>", $data['description']);
                                            echo $data['description'];
                                        ?>
                                    </p>

                                    <a href="<?php echo $data['link']; ?>"><?php echo $data['link']; ?></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
