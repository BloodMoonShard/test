<?php foreach ($objects as $v) { ?>
    <div class="one-object">
        <div class="title">
            <h2><?= $v['name_object'] ?></h2>
        </div>
        <div class="content clearfix">
            <a href="/details/<?php echo $v['id_objects']; ?>">
                <img src="/upload_files/objects_img/<?php echo @$v['ob_images'][0]['img_name'] ?>" alt="">
            </a>
            <div class="specifications">
                <div class="spec-line">
                    <div class="spec-label">Шоссе:</div>
                    <div class="spec-text underline"><?= $v['highway_name']; ?></div>
                </div>
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


