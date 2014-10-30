<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Агенты менеджера: <?php echo $username;?></h1>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php if (sizeof($agents)>0) {?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Имя пользователя</th>
                                    <th>E-mail</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1; foreach ($agents as $a) { ?>
                                    <tr>
                                        <th><?php echo $counter; ?></th>
                                        <th><?php echo $a['username']; ?></th>
                                        <th><?php echo $a['email']; ?></th>
                                        <th><a href="/admin/ctrl_users/setAgentFree/<?php echo $a['id_users']; ?>">Убрать агента</a></th>
                                    </tr>
                                    <?php $counter++;} ?>
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-info" href="/admin/ctrl_users/add_agent_to_manager/<?php echo $id_manager; ?>">Добавить агентов</a>
                    <?php } else {
                        echo '<p class="lead">За менеджером не закреплен ни один агент.</p>';
                        echo '<a class="btn btn-info" href="/admin/ctrl_users/add_agent_to_manager/'.$id_manager.'">Добавить агентов</a>';
                    } ?>
                </div>
            </div>
            <hr class="divider">
            <a class="btn btn-default" href="/admin/ctrl_users">Обратно</a>
        </div>
    </div>
</div>
