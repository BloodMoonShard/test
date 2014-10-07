<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Вакансии</h1>
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
                                    <th>Название вакансии</th>
                                    <th>Показ на сайте</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1; foreach ($data as $d) { ?>
                                    <tr>
                                        <th><?php echo $counter; ?></th>
                                        <th><?php echo $d['title'] ?></th>
                                        <th>
                                            <?php
                                            if($d['display'] == 1) {
                                                echo '<span class="text-success">Отображается</span>';
                                            } else {
                                                echo '<span class="text-warning">Не отображается</span>';
                                            }
                                            ?>
                                        </th>
                                        <th><a href="/admin/ctrl_vacancy/edit_vacancy/<?php echo $d['id'] ?>">Редактировать</a> /
                                            <a style="color: red;" href="/admin/ctrl_vacancy/delete_vacancy/<?php echo $d['id'] ?>" onclick="return confirm('Удалить вакансию?')">Удалить</a></th>
                                    </tr>
                                    <?php $counter++;} ?>
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-info" href="/admin/ctrl_vacancy/add_vacancy">Добавить вакансию</a>
                    <?php } else {
                        echo '<p class="lead">Вы еще не добавили ни одной вакансии</p>';
                        echo '<p><a class="btn btn-info" href="/admin/ctrl_vacancy/add_vacancy">Добавить вакансию</a></p>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
