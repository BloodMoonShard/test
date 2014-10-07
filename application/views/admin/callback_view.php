<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Обратные звонки</h1>
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
                                    <th>Дата создания заявки</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1; foreach ($data as $d) { ?>
                                    <tr <?php if ($d['submit'] == 1) echo 'class="success"';?>>
                                        <th><?php echo $counter; ?></th>
                                        <th><?php echo $d['name'] ?></th>
                                        <th><?php echo $d['phone_number'] ?></th>
                                        <th><?php echo $d['date'] ?></th>
                                        <th>
                                            <?php if($d['submit'] != 1) {?>
                                            <a href="/admin/ctrl_callback/submit_callback/<?php echo $d['id'] ?>" class="text-success">Обработано</a>
                                            <?php } else { ?>
                                            <a style="color: red;" href="/admin/ctrl_callback/delete_callback/<?php echo $d['id'] ?>" onclick="return confirm('Точно удалить?')">Удалить</a></th>
                                            <?php } ?>
                                    </tr>
                                    <?php $counter++;} ?>
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-danger" href="/admin/ctrl_callback/clear" onclick="return confirm('Точно удалить ВСЁ?')">Очистить (удалить все записи)</a>
                    <?php } else {
                        echo '<p class="lead">На данный момент заявок на обратный звонок не поступало.</p>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
