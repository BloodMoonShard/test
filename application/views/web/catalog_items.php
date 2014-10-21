    <?php foreach ($objects as $v) { ?>
        <div class="one-object">
            <div class="title">
                <h2><?= $v['name_object'] ?></h2>
            </div>
            <div class="content clearfix">
                <img src="/upload_files/objects_img/<?php echo @$v['ob_images'][0]['img_name'] ?>" alt="">

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

                    <p>
                        <?php
                        if (strlen($v['31'])>80) {
                            echo mb_substr(strip_tags($v['31']), 0, 80) . ' ...';
                        } else {
                            echo mb_substr(strip_tags($v['31']), 0, 80);
                        }
                        ?>
                    </p>

<!--                    <div class="more-info">-->
<!--                        <a href="/details/--><?//= $v['id_objects'] ?><!--">Подробнее</a>-->
<!---->
<!--                        <form action="" method="post">-->
<!--                            <input name="to-list" id="to-list" type="checkbox" value="1"><label-->
<!--                                for="to-list">Сравнить</label>-->
<!--                        </form>-->
<!--                    </div>-->
                    <?php $session_comparison = $this->session->userdata('comparison');?>
                    <div class="more-info">
                        <a href="/details/<?= $v['id_objects'] ?>">Подробнее</a>
                        <?php
                            $in_comparison=false; foreach ($session_comparison as $s) {
                            if ($s == $v['id_objects']) {
                                $in_comparison = true;
                                break;
                            }
                        } ?>
                        <div class="in-comp">
                            <input name="to-list" class="to-list"
                                   id="to-list-<?php echo $v['id_objects'] ?>"
                                   type="checkbox"
                                   value="<?php echo $v['id_objects']; ?>"
                                <?php if($in_comparison) echo 'checked' ?>>
                            <label
                                for="to-list-<?php echo $v['id_objects'] ?>"
                                id="label-<?php echo $v['id_objects'] ?>" ><?php if($in_comparison) {echo 'Список сравнения'; }else { echo 'Сравнить';} ?></label>
                        </div>
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


