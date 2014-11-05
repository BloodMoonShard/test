    <div class="grand-bg">
        <div class="sub-navigation">
            <div class="container">
                <ul class="clearfix">
                    <li class="current-page"><h1>Список сравнения: <span id="count_in_comp"><?php echo sizeof($objects); ?></span></h1></li>
                    <li class="delimiter"></li>
                    <li class="home-link"><img src="/assets/w/design_img/home.png" alt="Домой"><a href="/">Главная</a></li>
                    <li class="search-link id="but-search-all""><img src="/assets/w/design_img/search_black.png" alt="Поиск объектов"><a href="#">Поиск объектов</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="#">Главная</a></li>
                <li> > </li>
                <li class="active-crumb">Список сравнения</li>
            </ul>
        </div>
        <section class="comparison">
                <div class="container">
                    <div class="section-sheet-body">
                        <div class="section-sheet-body-inner">
                            <?php if (sizeof($objects)>0) { ?>
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
                                                <span>&times;</span><a href="/comparison/clear_copmarison">Очистить историю</a>
                                            </p>
                                        </td>
                                        <?php foreach ($objects as $ob) {
                                            if ($ob['ob_images'][0]['img_name']!= '') {
                                                echo '<td class="img"><div class="close-co" id="'.$ob['id_objects'].'"></div><img src="/upload_files/objects_img/'.$ob['ob_images'][0]['img_name'].'" alt=""></td>';
                                            } else {
                                                echo '<td class="img"><div class="close-co" id="'.$ob['id_objects'].'"></div><img src="/upload_files/objects_img/default_img.gif" alt=""></td>';
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
                            <?php }else {
                                echo 'Список сравнения пуст.';
                            } ?>
                        </div>
                    </div>
                </div>
        </section>
    </div>
