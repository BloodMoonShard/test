<?php foreach ($objects as $v) { ?>
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
                <div class="spec-line">
                    <div class="spec-label">Количество комнат:</div>
                    <div class="spec-text"><?= $v['33']; ?></div>
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


