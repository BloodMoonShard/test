<?php $options_s = $this->session->userdata('options_s');
$search_result = $this->session->userdata('search_result');?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Заказы</h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Поиск заказов</h3>
            <form class="form-horizontal" role="form" method="POST">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="id_objects" class="col-lg-4 control-label">ID:</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="id_objects" name="id_objects"
                                   value="<?php if (isset($options_s['id_objects'])) {echo $options_s['id_objects']; }?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="article" class="col-lg-4 control-label">ID объекта:</label>

                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="article" name="article"
                                   value="<?php if (isset($options_s['article'])) {echo $options_s['article']; }?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="buyer" class="col-lg-4 control-label">ФИО покупателя:</label>

                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="buyer" name="buyer"
                                   value="<?php if (isset($options_s['buyer'])) {echo $options_s['buyer']; }?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="buyer_phone" class="col-lg-4 control-label">Телефон:</label>

                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="buyer_phone" name="buyer_phone"
                                   value="<?php if (isset($options_s['buyer_phone'])) {echo $options_s['buyer_phone']; }?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-4 col-lg-8">
                            <button type="submit" class="btn btn-success">Найти</button>
                            <a href="/admin/orders/clear_ses_search" class="btn btn-info">Очистить</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="status_obj" class="col-lg-5 control-label">Статус заказа:</label>
                        <div class="col-lg-7">
                            <select class="form-control" id="status_obj" name="status_obj">
                                <option value="">Неважно</option>
                                <?php foreach ($status_options as $so) {
                                    $check = '';
                                    if (isset($options_s['status_obj'])) {
                                        if ($options_s['status_obj'] == $so['id'])
                                            $check = 'selected';
                                    }
                                    echo '<option value="'.$so['id'].'" '.$check.' >'.$so['status'].'</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="search_sort" class="col-lg-5 control-label">Сортировка:</label>
                        <div class="col-lg-7">
                            <select class="form-control" id="search_sort" name="search_sort">
                                <option value="">Без сортировки</option>
                                <option value="sort_status" <?php if (isset($options_s['search_sort'])) {if ($options_s['search_sort'] == 'sort_status') {echo 'selected';}}?>>По статусам</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-5 control-label">Дата от:</label>
                        <div class="col-lg-7">
                            <div class="input-group date">
                                <input type="text" class="form-control" name="date_sort_begin"
                                       value="<?php if (isset($options_s['date_sort_begin'])) {echo date('d-m-Y', $options_s['date_sort_begin']); }?>">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-5 control-label">Дата до:</label>
                        <div class="col-lg-7">
                            <div class="input-group date">
                                <input type="text" class="form-control" name="date_sort_end"
                                       value="<?php if (isset($options_s['date_sort_end'])) {echo date('d-m-Y', $options_s['date_sort_end']); }?>">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="type_object" class="col-lg-5 control-label">Тип объекта:</label>
                        <div class="col-lg-7">
                            <select class="form-control" id="type_object" name="type_object">
                                <option value="">Неважно</option>
                                <?php foreach ($objects_type_options as $ot) {
                                    $check = '';
                                    if (isset($options_s['type_object'])) {
                                        if ($options_s['type_object'] == $ot['id'])
                                            $check = 'selected';
                                    }
                                    echo '<option value="'.$ot['id_objects_type'].'" '.$check.' >'.$ot['name'].'</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php if ($search_result) { ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Покупатель</th>
                                    <th>Статус</th>
                                    <th>Исполнитель</th>
                                    <th>Дополнительная информация</th>
                                    <th>Комментарии</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($search_result as $r) { ?>
                                    <tr>
                                        <th><a class="text-danger" href="/admin/objects/control_order/<?php echo $r['id_objects']; ?>"><?php echo $r['id_objects']; ?></a></th>
                                        <th><?php echo $r['buyer']; ?></th>
                                        <th><?php echo $r['status_obj']; ?></th>
                                        <th><?php echo $r['performer']; ?></th>
                                        <th><?php echo $r['additional_info']; ?></th>
                                        <th><?php echo $r['comment']; ?></th>
                                    </tr>
                                    <?php
                                } ?>
                                </tbody>
                            </table>
                        </div>

                                          <?php
                    } else {
                        if (($options_s!=false) && ($search_result==false)) {
                        echo '<div class="col-lg-8 col-lg-offset-1"><p class="lead">Ничего не найдено, попробуйте изменить параметры поиска</p></div>';
                    }}  ?>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
