<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Настройка SEO</h1>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <?php var_dump($data); ?>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php if (sizeof($data)>0) {?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Название партнера</th>
                                    <th>Описание партнера</th>
                                    <th>Изображение (лого) партнера</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1; foreach ($data as $d) { ?>
                                    <tr>
                                        <th><?php echo $counter; ?></th>
                                        <th><?php echo $d['name'] ?></th>
                                        <th><?php echo $d['description'] ?></th>
                                        <th><img class="a_partners_preview" src="/upload_files/partners_img/<?php echo $d['img'] ?>" alt=""></th>
                                        <th><a href="/admin/ctrl_partners/edit_partner/<?php echo $d['id'] ?>">Редактировать</a> /
                                            <a style="color: red;" href="/admin/ctrl_partners/delete_partner/<?php echo $d['id'] ?>" onclick="return confirm('Удалить партнера?')">Удалить</a></th>
                                    </tr>
                                    <?php $counter++;} ?>
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-info" href="/admin/ctrl_partners/add_partner">Добавить партнера</a>
                    <?php } else {
                        echo '<p class="lead">Вы еще не добавили партнеров</p>';
                        echo '<p><a class="btn btn-info" href="/admin/ctrl_partners/add_partner">Добавить партнера</a></p>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
