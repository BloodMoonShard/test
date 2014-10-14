<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Управление резюме</h1>
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
                                    <th>Имя</th>
                                    <th>Номер телефона</th>
                                    <th>Файл резюме</th>
                                    <th>Дата отправки резюме</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1; foreach ($data as $d) { ?>
                                    <tr>
                                        <th><?php echo $counter; ?></th>
                                        <th><?php echo $d['name'] ?></th>
                                        <th><?php echo $d['phone_number'] ?></th>
                                        <th><a class="text-success" href="/admin/download_file/<?php echo $d['file_resume'] ?>">Скачать</a></th>
                                        <th><?php echo $d['create_date'] ?></th>
                                        <th>
                                            <a style="color: red;" href="/admin/ctrl_resume/delete_resume/<?php echo $d['id'] ?>" onclick="return confirm('Вы уверены?')">Удалить</a>
                                        </th>
                                    </tr>
                                    <?php $counter++;} ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else {
                        echo '<p class="lead">Резюме никто не присылал.</p>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
