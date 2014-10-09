<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Строительство</h1>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php if (sizeof($data)>0) {?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Заголовок объекта</th>
                                    <th>Описание</th>
                                    <th>Первое изображение</th>
                                    <th>Дата создания</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1; foreach ($data as $d) { ?>
                                    <tr>
                                        <th><?php echo $counter; ?></th>
                                        <th><?php echo $d['title']; ?></th>
                                        <th><?php echo $d['description']; ?></th>
                                        <th><img class="a_partners_preview" src="/upload_files/building_img/<?php echo $d['images'][0]['img_name'] ?>" alt=""></th>
                                        <th><?php echo $d['create_date']; ?></th>
                                        <th><a href="/admin/ctrl_building/edit_building/<?php echo $d['id'] ?>">Редактировать</a> /
                                            <a style="color: red;" href="/admin/ctrl_building/delete_building/<?php echo $d['id'] ?>" onclick="return confirm('Удалить объект?')">Удалить</a></th>
                                    </tr>
                                    <?php $counter++;} ?>
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-info" href="/admin/ctrl_building/add_building">Добавить строительный объект</a>
                    <?php } else {
                        echo '<p class="lead">Вы еще не добавили строительных объектов</p>';
                        echo '<p><a class="btn btn-info" href="/admin/ctrl_building/add_building">Добавить строительный объект</a></p>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
