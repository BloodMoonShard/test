    <div class="grand-bg">
        <div class="sub-navigation">
            <div class="container">
                <ul class="clearfix">
                    <li class="current-page"><h1>Партнеры</h1></li>
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
                <li class="active-crumb">Партнеры</li>
            </ul>
        </div>
        <section class="partners">
            <div class="container">
                <div class="section-sheet-body">
                    <div class="section-sheet-body-inner">
                        <div class="spec-padding clearfix">
                            <?php
                                $i = 1; foreach ($partners as $p) {
                                $nulled_margin = '';
                                if ($i%3 == 0) {$nulled_margin = "nulled-margin";}
                            ?>
                                    <div class="one-partner <?php echo $nulled_margin; ?>">
                                        <div class="logo-partner">
                                            <div class="logo-partner-inner">
                                                <img src="/upload_files/partners_img/<?php echo $p['img']; ?>" alt="<?php echo $p['name']; ?>">
                                            </div>
                                        </div>
                                        <p>
                                           <?php echo $p['description']; ?>
                                        </p>
                                    </div>
                            <?php
                                $i++; }
                            ?>

<!---->
<!--                            <div class="one-partner">-->
<!--                                <div class="logo-partner">-->
<!--                                    <div class="logo-partner-inner partner-logo-1"></div>-->
<!--                                </div>-->
<!--                                <p>-->
<!--                                    Журнал «СОВРЕМЕННЫЙ ДОМ И ОФИС» - авторитетный эксперт по интерьеру и строительству.-->
<!--                                </p>-->
<!--                            </div>-->
<!--                            <div class="one-partner">-->
<!--                                <div class="logo-partner">-->
<!--                                    <div class="logo-partner-inner partner-logo-2"></div>-->
<!--                                </div>-->
<!--                                <p>-->
<!--                                    Каталог "М&Ц" <Br/> мебельные и интерьерные центры, специализированные интерьерные салоны-->
<!--                                </p>-->
<!--                            </div>-->
<!--                            <div class="one-partner nulled-margin">-->
<!--                                <div class="logo-partner">-->
<!--                                    <div class="logo-partner-inner partner-logo-3"></div>-->
<!--                                </div>-->
<!--                                <p>-->
<!--                                    СОВРЕМЕННЫЙ ДОМ И ОФИС  — практический информационно-рекламный журнал о строительстве и интерьере.-->
<!--                                </p>-->
<!--                            </div>-->

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
