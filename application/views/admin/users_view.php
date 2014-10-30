<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Контроль пользователей</h1>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php if (sizeof($users)>0) {?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Имя пользователя</th>
                                    <th>E-mail</th>
                                    <th>Роль</th>
                                    <th>Действия</th>
                                    <?php  if (($this->auth->get_user_role() == 1)) {
                                        echo ' <th>Агенты</th>';
                                    }?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1; foreach ($users as $u) { ?>
                                    <tr>
                                        <th><?php echo $counter; ?></th>
                                        <th><?php echo $u['username']; ?></th>
                                        <th><?php echo $u['email']; ?></th>
                                        <th><?php echo $u['role']; ?></th>
                                        <th><a href="/admin/ctrl_users/edit_user/<?php echo $u['id_users'] ?>">Редактировать</a> /
                                            <a style="color: red;" href="/admin/ctrl_users/remove_user/<?php echo $u['id_users'] ?>" onclick="return confirm('Удалить пользователя?')">Удалить</a></th>
                                        <?php  if (($this->auth->get_user_role() == 1) && ($u['id']==4)) {
                                            echo '<th><a href="/admin/ctrl_users/manager_agents/'.$u['id_users'].'">Посмотреть/изменить ('.$u['count_agents'].')</a></th>';
                                        }?>
                                    </tr>
                                    <?php $counter++;} ?>
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-info" href="/admin/ctrl_users/add_user">Добавить пользователя</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
