<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Редактирование пользователя: <?php echo $userinfo['username']?></h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-cogs"></i> Контроль пользователей</li>
                <li class=""> Редактировать пользователя</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Имя пользователя</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="<?php echo $userinfo['username']?>">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email"
                           value="<?php echo $userinfo['email']?>">
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <p class="help-block">Оставьте пустым, если не хотите изменить пароль</p>
                </div>
                <div class="form-group">
                    <label for="user_role" class="col-lg-2 control-label">Роль</label>
                    <select class="form-control" id="user_role" name="user_role">
                        <option value="">Выбрать</option>
                        <?php foreach ($roles as $r) {
                            $check = '';
                            if($r['id'] == $userinfo['user_role']) {$check = 'selected'; }
                            echo '<option value="' . $r['id'] . '" '. $check .'>' . $r['role'] . '</option>';
                        } ?>
                    </select>
                </div>


                <button type="submit" class="btn btn-success">Готово</button>
            </form>
        </div>
    </div>
    <hr class="divider">
    <a class="btn btn-default" href="/admin/ctrl_users">Обратно</a>
</div>