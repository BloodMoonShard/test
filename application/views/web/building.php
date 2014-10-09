    <div class="grand-bg">
        <div class="sub-navigation">
            <div class="container">
                <ul class="clearfix">
                    <li class="current-page"><h1>Строительство</h1></li>
                    <li class="delimiter"></li>
                    <li class="home-link"><img src="/assets/w/design_img/home.png" alt="Домой"><a href="/">Главная</a></li>
                    <li class="search-link"><img src="/assets/w/design_img/search_black.png" alt="Поиск объектов"><a href="#">Поиск объектов</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="/">Главная</a></li>
                <li> > </li>
                <li class="active-crumb">Строительство</li>
            </ul>
        </div>
        <section class="building">
                <div class="container clearfix">
                    <div class="left-side">
                        <?php
                            if (sizeof($data) == 0) {
                                echo '<div class="line clearfix"><h3>В ближайшее время будут добавлены новые строительные объекты</h3></div>';
                            }
                            foreach($data as $d) {
                        ?>
                            <div class="line clearfix">
                                <img src="/upload_files/building_img/<?php echo $d['images'][0]['img_name']; ?>" alt="<?php echo $d['title']; ?>">
                                <div class="content">
                                    <h3><?php echo $d['title']; ?></h3>
                                    <p>
                                        <?php
                                            if (strlen($d['description'])>200) {
                                                echo mb_substr(strip_tags($d['description']), 0, 200) . ' ...';
                                            } else {
                                                echo $d['description'];
                                            }
                                        ?>
                                    </p>
                                    <a href="/type/building/<?php echo $d['id']; ?>">Подробнее</a>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                    <div class="right-side">
                        <div class="section-sheet-body">
                            <div class="section-sheet-body-inner">
                                <div class="content">
                                    <p class="title">
                                        Постройте <Br/>
                                        <span class="big">дом своей мечты</span>
                                    </p>
                                    <p>
                                        Иногда люди собираются купить дом у владельцев, а потом отказываются
                                        от этой идеи в пользу нового дома. Слева вы можете ознакомиться с домами,
                                        которые построили наши партнеры. Вы можете заказать постройку такого же
                                        дома, на выбранном участке.
                                    </p>
                                    <Br/>
                                    <p>
                                        Мы гарантируем выгодные условия от наших партнёров из строительных фирм и помощь
                                        в оформлении документации.
                                    </p>
                                    <img src="/assets/w/design_img/buy-house.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
