    <div class="grand-bg">
        <div class="sub-navigation">
            <div class="container">
                <ul class="clearfix">
                    <li class="current-page"><h1>Вакансии</h1></li>
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
                <li class="active-crumb">Вакансии</li>
            </ul>
        </div>
        <section class="job">
            <div class="container">
                <div class="section-sheet-body">
                    <div class="section-sheet-body-inner">
                        <div class="spec-padding">
                            <h3 class="h3-gen-blue">К нам приходят за свободой</h3>
                            <p>
                                Если вам нужен нестандартный график и вы стремитесь к карьерному росту,
                                то работа у нас 100% подходит вам.
                            </p>
                            <p class="job-falsehood-h">
                                Вакансии
                            </p>
                            <ul class="job-vacancy">
                                <?php
                                    $count = 0;
                                    foreach ($vacancy as $v) {
                                    $resp = explode("\n", $v['responsibility']);
                                    $req = explode("\n", $v['requirements']);
                                    $con = explode("\n", $v['conditions']);
                                    $id_gen = 'r-v1' . $count;
                                ?>
                                <li><span class="job-vacancy-head" onclick="show_hide('#<?php echo $id_gen; ?>');return false;"><?php echo $v['title']; ?></span>
                                    <ul class="job-requirements" id="<?php echo $id_gen; ?>">
                                        <li class="job-requirements-head">Обязанности:</li>
                                        <?php foreach ($resp as $rp) {
                                            echo '<li><span>' . $rp . '</span></li>';
                                        } ?>
                                        <li class="job-requirements-head">Требования:</li>
                                        <?php foreach ($req as $rq) {
                                            echo '<li><span>' . $rq . '</span></li>';
                                        } ?>
                                        <li class="job-requirements-head">Условия:</li>
                                        <?php foreach ($con as $cn) {
                                            echo '<li><span>' . $cn . '</span></li>';
                                        } ?>
                                    </ul>
                                </li>
                                <?php
                                    $count++;
                                    }
                                ?>
                            </ul>

                        </div>
                        <div class="bottom-control clearfix">
                            <a href="#" class="btn-send-resume">Отправить резюме</a>
                            <a href="#" class="btn-view-all">Посмотри все наши вакансии</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
