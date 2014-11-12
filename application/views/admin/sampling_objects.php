<?php
$options_s = $this->session->userdata('options_selection');
$selection_result = $this->session->userdata('selection_result');
?>
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Выборка объектов недвижимости</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" role="form" method="POST">
            <div class="col-lg-5">
                <div class="form-group">
                    <label for="id_objects" class="col-lg-4 control-label">ID:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="id_objects" name="id_objects"
                               value="<?php if (isset($options_s['id_objects'])) {
                                   echo $options_s['id_objects'];
                               } ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="article" class="col-lg-4 control-label">ID объекта:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="article" name="article"
                               value="<?php if (isset($options_s['article'])) {
                                   echo $options_s['article'];
                               } ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-lg-4 control-label">Населенный пункт:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="city" name="city"
                               value="<?php if (isset($options_s['city'])) {
                                   echo $options_s['city'];
                               } ?>">
                    </div>
                </div>

                <?php if($this->auth->get_user_role() != 3) { ?>

                <div class="form-group">
                    <label for="users_obj" class="col-lg-4 control-label">Объекты добавил:</label>
                    <div class="col-lg-8">
                        <select class="form-control" id="users_obj" name="users_obj">
                            <option value="">Неважно</option>
                            <?php foreach ($list_users as $lu) {
                                $check = '';
                                if (isset($options_s['users_obj'])) {
                                    if ($options_s['users_obj'] == $lu['id_users'])
                                        $check = 'selected';
                                }
                                echo '<option value="' . $lu['id_users'] . '" ' . $check . ' >' . $lu['username'] . '</option>';
                            } ?>
                        </select>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="type_object" class="col-lg-5 control-label">Тип объекта:</label>

                    <div class="col-lg-7">
                        <select class="form-control" id="type_object" name="type_object">
                            <option value="">Неважно</option>
                            <?php foreach ($objects_type_options as $ot) {
                                $check = '';

                                if (isset($options_s['type_object'])) {
                                    if ($options_s['type_object'] == $ot['id_objects_type'])
                                        $check = 'selected';
                                }
                                echo '<option value="' . $ot['id_objects_type'] . '" ' . $check . ' >' . $ot['name'] . '</option>';
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status_obj" class="col-lg-5 control-label">Статус объекта:</label>

                    <div class="col-lg-7">
                        <select class="form-control" id="status_obj" name="status_obj">
                            <option value="">Неважно</option>
                            <?php foreach ($status_options as $so) {
                                $check = '';
                                if (isset($options_s['status_obj'])) {
                                    if ($options_s['status_obj'] == $so['id'])
                                        $check = 'selected';
                                }
                                echo '<option value="' . $so['id'] . '" ' . $check . ' >' . $so['status'] . '</option>';
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="search_sort" class="col-lg-5 control-label">Сортировка:</label>

                    <div class="col-lg-7">
                        <select class="form-control" id="search_sort" name="search_sort">
                            <option value="">Без сортировки</option>
                            <option value="sort_status" <?php if (isset($options_s['search_sort'])) {
                                if ($options_s['search_sort'] == 'sort_status') {
                                    echo 'selected';
                                }
                            } ?>>По статусам
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-5 control-label">Дата от:</label>

                    <div class="col-lg-7">
                        <div class="input-group date">
                            <input type="text" class="form-control" name="date_sort_begin"
                                   value="<?php if (isset($options_s['date_sort_begin'])) {
                                       echo date('d-m-Y', $options_s['date_sort_begin']);
                                   } ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">Дата до:</label>

                    <div class="col-lg-7">
                        <div class="input-group date">
                            <input type="text" class="form-control" name="date_sort_end"
                                   value="<?php if (isset($options_s['date_sort_end'])) {
                                       echo date('d-m-Y', $options_s['date_sort_end']);
                                   } ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-5 col-lg-7">
                        <button type="submit" class="btn btn-success">Подбор</button>
                        <a href="/admin/objects/clear_ses_selection" class="btn btn-info">Очистить</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
    <div class="row">
       <div class="panel panel-default">
            <div class="panel-body">
                <?php if ($selection_result) { ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Дата создания</th>
                                <th>Статус объекта</th>
                                <th>Цена</th>
                                <th>Разместил</th>
                                <th>Действия</th>
                                <th>Заказ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(sizeof($selection_result) > 0){
                                foreach($selection_result as $d){
                                    $color_tr = '';
                                    if ($d['status_obj'] == 'Показ') {$color_tr = 'class="success"';}
                                    if ($d['status_obj'] == 'Отклонено') {$color_tr = 'class="danger"';}
                                    if ($d['status_obj'] == 'На модерации') {$color_tr = 'class="warning"';}
                                    ?>
                                    <tr <?php echo $color_tr; ?>>
                                        <td><?= $d['id_objects']?></td>
                                        <td><?= $d['name_object']?></td>
                                        <td><?= $d['date_add']?></td>
                                        <td><?php if($d['status_obj'] != null){echo $d['status_obj'];}else{echo "-";}?></td>
                                        <td>
                                            <?php if($d['price']) {
                                                echo $d['price'].'  руб.';
                                            }else {
                                                echo '-';
                                            } ?>

                                        </td>
                                        <td><?= $d['username']?></td>
                                        <td class="text-center">
                                            <a href="/admin/objects/edit_object/<?= $d['id_objects']?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="/admin/objects/rm_object/<?= $d['id_objects']?>"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a class="<?php if($d['order_flag']!=0) {echo 'text-success';} ?>" href="/admin/objects/control_order/<?= $d['id_objects']?>"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        </td>
                                    </tr>
                                <?php }
                            }?>
                            </tbody>
                        </table>
                    </div>
                <?php
                } else {
                    if (($options_s!=false) && ($selection_result==false)) {
                        echo '<div class="col-lg-8 col-lg-offset-1"><p class="lead">Ничего не найдено, попробуйте изменить параметры поиска</p></div>';
                    }}  ?>
            </div>
        </div>
    </div>
    <hr class="divider">
    <a class="btn btn-default" href="/admin/objects">Обратно</a>

    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>