<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Добавить агентов</h1>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php if (sizeof($free_agents)>0) {?>
                    <form role="form" method="POST" action="">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Имя пользователя</th>
                                    <th>E-mail</th>
                                    <th>Добавить/убрать</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1; foreach ($free_agents as $f) { ?>
                                    <tr>
                                        <th><?php echo $counter; ?></th>
                                        <th><?php echo $f['username']; ?></th>
                                        <th><?php echo $f['email']; ?></th>
                                        <th><input class="checkbox" type="checkbox" name="agents_id[]" value="<?php echo $f['id_users']?>"></th>
                                    </tr>
                                    <?php $counter++;} ?>
                                </tbody>
                            </table>
                        </div>
                        <input class="btn btn-success" type="submit" value="Сохранить">
                    </form>
                    <?php } else {
                        echo '<p class="lead">Нет свободных агентов.</p>';
                    } ?>
                </div>
            </div>
            <hr class="divider">
            <a class="btn btn-default" href="/admin/ctrl_users/manager_agents/<?php echo $id_manager; ?>">Обратно</a>
        </div>
    </div>
</div>
