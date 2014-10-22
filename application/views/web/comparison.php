    <div class="grand-bg">
        <div class="sub-navigation">
            <div class="container">
                <ul class="clearfix">
                    <li class="current-page"><h1>Список сравнения: 3</h1></li>
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
                <li><a href="#">Квартиры</a></li>
                <li> > </li>
                <li class="active-crumb">Список сравнения</li>
            </ul>
        </div>
        <section class="comparison">
                <div class="container">
                    <div class="section-sheet-body">
                        <div class="section-sheet-body-inner">
                            <table>
                                <tbody>
                                    <tr class="head l-g">
                                        <td class="sort-input">
                                            <p>Сортировать по:</p>
                                            <select>
                                                <option>Типу</option>
                                                <option>Виду</option>
                                            </select>
                                            <p class="clear-history">
                                                <span>&times;</span><a href="#">Очистить историю</a>
                                            </p>
                                        </td>
                                        <?php foreach ($objects as $ob) {
                                            if ($ob['ob_images'][0]['img_name']!= '') {
                                                echo '<td class="img"><div class="close-co" id="'.$ob['id_objects'].'"></div><img src="/upload_files/objects_img/'.$ob['ob_images'][0]['img_name'].'" alt=""></td>';
                                            } else {
                                                echo '<td class="img"><div class="close-co"></div><img src="/upload_files/objects_img/default_img.gif" alt=""></td>';
                                            }
                                        }
                                        ?>
                                    </tr>


                                    <?php $counter=2; foreach ($cat_name as $key => $value) {
                                        if ($counter%2 == 0) { ?>
                                            <tr class="l-w">
                                                <td class="desc">
                                                    <?php echo $value.':'; ?>
                                                </td>

                                                <?php
                                                   foreach ($objects as $ob) {
                                                       if ($ob[$key] == '') { echo '<td class="object-'.$ob['id_objects'].'"> - </td>'; } else {
                                                           echo '<td class="object-'.$ob['id_objects'].'">'.$ob[$key].'</td>';
                                                       }
                                                   }
                                                ?>
                                            </tr>
                                    <?php } else { ?>
                                            <tr class="l-g">
                                                <td class="desc">
                                                    <?php echo $value.':'; ?>
                                                </td>

                                                <?php
                                                foreach ($objects as $ob) {
                                                    if ($ob[$key] == '') { echo '<td class="object-'.$ob['id_objects'].'"> - </td>'; } else {
                                                        echo '<td class="object-'.$ob['id_objects'].'">'.$ob[$key].'</td>';
                                                    }
                                                }
                                                ?>
                                            </tr>
                                    <?php
                                        } $counter++;}
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <footer> <!-- footer -->
        <div class="footer-bg-teeth"></div>
        <div class="container">
            <div class="footer-nav clearfix">
                <ul class="footer-nav-block">
                    <li><a href="#">О компании</a></li>
                    <li><a href="#">Контакты</a></li>
                    <li><a href="#">Карта</a></li>
                </ul>
                <ul class="footer-nav-block">
                    <li><a href="#">Коттеджи, дома</a></li>
                    <li><a href="#">Земельные участки</a></li>
                    <li><a href="#">Квартиры</a></li>
                </ul>
                <ul class="footer-nav-block">
                    <li><a href="#">Строительство</a></li>
                    <li><a href="#">Коммерческая недвижимость</a></li>
                    <li><a href="#">Зарубежная недвижимость</a></li>
                </ul>
                <ul class="footer-nav-block">
                    <li><a href="#">Юридические услуги</a></li>
                    <li><a href="#">Кредитный брокер</a></li>
                    <li><a href="#">Партнеры</a></li>
                </ul>
                <ul class="footer-nav-block nulled-margin">
                    <li><a href="#">Обратная связь</a></li>
                    <li><a href="#">Вакансии</a></li>
                    <li><a href="#">Заказать звонок</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container clearfix">
                <div class="social clearfix">
                    <a href="#"><div class="social-link vk"></div></a>
                    <a href="#"><div class="social-link twitter"></div></a>
                </div>
                <p class="copyright">&copy; 2014 ООО &laquo; Авантэлт &raquo;. Все права защищены.</p>
                <form class="search" action="" method="POST">
                    <input type="submit">
                    <input type="text" name="search_query" id="search_query-f" placeholder="Введите артикул или населенный пункт">
                </form>
                <div class="callnumber">
                    +7 (495) 540-43-03
                </div>
            </div>
        </div>
